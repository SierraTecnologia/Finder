<?php
namespace Finder\Spider\Traits;

use Muleta\Helps\DebugHelper;
use Finder\Contracts\Spider\ExtensionManager;

/**
 * Outputs events information to the console.
 *
 * @see TriggerableInterface
 */
trait IdentificadorManagerTrait
{
    protected $extension = false;

    protected function setExtension(ExtensionManager $extension): void
    {
        $this->extension = $extension;
    }

    public function getExtension()
    {
        return $this->extension;
    }

    public function getFile()
    {
        return $this->getExtension()->getFile();
    }

    public function getContents()
    {
        return $this->getExtension()->getContents();
    }

    /**
     * Lógica
     *
     * @return void
     */
    protected function run(): void
    {
        DebugHelper::debug('Run Identificador '.$this->getFile());
        if ($this->identify()) {
            DebugHelper::info('Arquivo identificado'.$this->getFile());
            $this->collectData();
        }
    }

    protected function doCollect(): void
    {
        $this->collectData();
    }

    public function collectData(): void
    {
        // @todo Fazer Aqui
        $this->collectDataEstrutura();
    }
}
