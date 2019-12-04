<?php
namespace Finder\Logic\Spider;

use Finder\Logic\Output\AbstractOutput;
use Finder\Logic\Output\Filter\OutputFilterInterface;
use Finder\Logic\Output\TriggerableInterface;

use Symfony\Component\Finder\Finder;

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

        $this->followChildrens($finder);
    }

}