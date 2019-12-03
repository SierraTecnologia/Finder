<?php
namespace Finder\Logic\Spider;

use Finder\Logic\Output\AbstractOutput;
use Finder\Logic\Output\Filter\OutputFilterInterface;
use Finder\Logic\Output\TriggerableInterface;

use Symfony\Component\Finder\Finder;

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
        $class = '\\Finder\\Logic\\Spider\\Extensions\\'.ucfirst($this->getTarget()->getExtension());
        if (class_exists($class)) {
            new $class($this->getTarget());

        }

        // dd($absoluteFilePath, $fileNameWithExtension, $this->target);
        // ...
    }
}