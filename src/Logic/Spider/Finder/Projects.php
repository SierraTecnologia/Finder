<?php
namespace Finder\Logic\Spider\Finder;

use Finder\Logic\Output\AbstractOutput;
use Finder\Logic\Output\Filter\OutputFilterInterface;
use Finder\Logic\Output\TriggerableInterface;

use Symfony\Component\Finder\Finder;
use Finder\Logic\Spider\Spider;

/**
 * Run all script analysers and outputs their result.
 */
class Projects extends Spider
{

    public function analyse()
    {
        $finder = new Finder();
        // find all files in the current directory
        $finder->in($this->getTargetPath());

        $finder->files()->name(['composer.json', 'package.json']);

        foreach ($finder as $file) {
            var_dump($file);
        }
        dd($finder);
    }


}