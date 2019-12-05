<?php
namespace Finder\Spider\Traits;

use Finder\Logic\Output\AbstractOutput;
use Finder\Logic\Output\Filter\OutputFilterInterface;
use Finder\Logic\Output\TriggerableInterface;

use Symfony\Component\Finder\Finder;
use Finder\Spider\Abstracts\Spider;
use Finder\Models\Entytys\Digital\Midia\File;
use Finder\Models\Entytys\Digital\Internet\ComputerFile;

use Finder\Spider\Abstracts\FileManager;

use Finder\Helps\DebugHelper;

use Finder\Logic\Analyser;

/**
 * Outputs events information to the console.
 * @see TriggerableInterface
 */
trait IdentificadorManagerTrait
{
    protected $extension = false;

    protected function setExtension(FileManager $extension)
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
     */
    protected function run()
    {
        DebugHelper::debug('Run Identificador '.$this->getFile());
        if ($this->identify()) {
            DebugHelper::info('Arquivo identificado'.$this->getFile());
            $this->collectData();
        }
    }
    protected function doCollect()
    {
        $this->collectData();
    }
}
