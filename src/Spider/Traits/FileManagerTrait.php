<?php
namespace Finder\Spider\Traits;

use Finder\Logic\Output\AbstractOutput;
use Finder\Logic\Output\Filter\OutputFilterInterface;
use Finder\Logic\Output\TriggerableInterface;

use Symfony\Component\Finder\Finder;
use Finder\Spider\Abstracts\Spider;
use Finder\Models\Entytys\Digital\Midia\File;
use Finder\Models\Entytys\Digital\Internet\ComputerFile;

use Finder\Logic\Analyser;

/**
 * Outputs events information to the console.
 * @see TriggerableInterface
 */
trait FileManagerTrait
{
    protected $file = false;

    protected function setFile($file)
    {
        if (is_string($file)) {
            $this->stringPath = true;
        }
        $this->file = $file;
    }

    public function getFile()
    {
        return $this->file;
    }
}
