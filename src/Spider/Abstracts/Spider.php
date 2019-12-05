<?php
namespace Finder\Spider\Abstracts;

use Finder\Logic\Output\AbstractOutput;
use Finder\Logic\Output\Filter\OutputFilterInterface;
use Finder\Logic\Output\TriggerableInterface;

use Symfony\Component\Finder\Finder;

use Finder\Spider\File;
use Finder\Spider\Directory;
use Finder\Spider\Registrator\FileRegistrator;
use Finder\Spider\Metrics\FileMetric;

use Finder\Helps\DebugHelper;

/**
 * Run all script analysers and outputs their result.
 */
abstract class Spider extends TargetManager
{
    protected $target = false;
    protected $parent = false;

    protected $registrator = false;
    protected $metrics = false;

    public function __construct($target, $parent = false)
    {
        $this->target = $target;
        $this->parent = $parent;
        $this->registrator = new FileRegistrator($this->getTarget(), $this->getParent());
        $this->metrics = new FileMetric($this->getTarget(), $this->getParent());
    }

    public function getUniqueIdentify()
    {
        // @todo reescrever
        return $target->getTargetPath();
    }

    public function getParent()
    {
        return $this->parent;
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
            DebugHelper::info('No Results: '.$this->getTargetPath());

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