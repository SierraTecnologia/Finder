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
        if ($this->identify()) {
            DebugHelper::debug('Arquivo identificado'.$this->getFile());
            $this->doCollect();
        }
    }
    protected function doCollect()
    {
        if (!empty(static::$identificadores)) {
            return true;
        }

        foreach (static::$identificadores as $identificador) {
            new $identificador($this);
        }
        return true;
    }
}
