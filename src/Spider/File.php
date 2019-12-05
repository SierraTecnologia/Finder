<?php
namespace Finder\Spider;

use Finder\Logic\Output\AbstractOutput;
use Finder\Logic\Output\Filter\OutputFilterInterface;
use Finder\Logic\Output\TriggerableInterface;

use Symfony\Component\Finder\Finder;
use Finder\Spider\Abstracts\Spider;

/**
 * Run all script analysers and outputs their result.
 */
class File extends Spider
{
    public function analyse()
    {
        $absoluteFilePath = $this->getTargetPath();
        $fileNameWithExtension = $this->target->getRelativePathname();

        $file = $this->registrator->registerAndReturnFile();
        $class = '\\Finder\\Spider\\Extensions\\'.ucfirst($this->getTarget()->getExtension());
        echo "\n\n".'Analisando Arquivo: '.$this->getTargetPath();
        if (class_exists($class)) {
            $analyse = new $class($this->getTarget());

        }

        // dd($absoluteFilePath, $fileNameWithExtension, $this->target);
        // ...
    }
}