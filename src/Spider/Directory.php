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
class Directory extends Spider
{

    public function analyse()
    {
        // find all files in the current directory
        $finder = new Finder();
        $finder->in($this->getTargetPath());
        echo "\n\n".'Analisando Pasta: '.$this->getTargetPath();

        $this->followChildrens($finder);
    }

}