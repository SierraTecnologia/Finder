<?php
namespace Finder\Spider\Abstracts;

use Finder\Logic\Output\AbstractOutput;
use Finder\Logic\Output\Filter\OutputFilterInterface;
use Finder\Logic\Output\TriggerableInterface;

use Symfony\Component\Finder\Finder;

use Finder\Spider\File;
use Finder\Spider\Directory;
use Finder\Spider\Registrator\FileRegistrator;

/**
 * Run all script analysers and outputs their result.
 */
abstract class Spider
{
    protected $target = false;
    protected $parent = false;
    protected $registrator = false;

    public function __construct($target, $parent = false)
    {
        $this->target = $target;
        $this->parent = $parent;
        $this->registrator = new FileRegistrator($this->getTarget());
    }

    public function getUniqueIdentify()
    {
        // @todo reescrever
        return $target->getTargetPath();
    }

    public function getTarget()
    {
        return $this->target;
    }

    public function getTargetPath()
    {
        if (is_string($this->getTarget())) {
            return $this->getTarget();
        }

        return $this->getTarget()->getRealPath();
    }

    public function run()
    {
        $this->analyse();
    }


    public function followChildrens($finder)
    {
        // check if there are any search results
        if (!$finder->hasResults()) {
            echo 'No Results: '.$this->getTargetPath();

            return true;
        }

        foreach ($finder as $file) {
            if ($file->getType() == 'file') {
                $newSpider = new File($file, $this);
            } else {
                $newSpider = new Directory($file, $this);
            }
            $newSpider->run();
        }

        return true;
    }
}