<?php
namespace Finder\Logic\Spider\Extensions;

use Finder\Logic\Output\AbstractOutput;
use Finder\Logic\Output\Filter\OutputFilterInterface;
use Finder\Logic\Output\TriggerableInterface;

use Symfony\Component\Finder\Finder;
use Finder\Logic\Spider\Spider;
use Finder\Models\Entytys\Digital\Midia\File;
use Finder\Models\Entytys\Digital\Internet\ComputerFile;

/**
 * Run all script analysers and outputs their result.
 */
class Json
{
    protected $file = false;

    public function __construct($file)
    {
        $this->setFile($file);
        $json = json_decode($file->getContents());
        dd($json);
    }

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