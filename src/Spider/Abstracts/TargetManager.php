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
abstract class TargetManager
{
    protected $target = false;
    protected $parent = false;
    protected $isStringPath = false;

    public function __construct($target, $parent = false)
    {
        $this->setTarget($target);
        $this->setParent($parent);
        $this->parent = $parent;
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

    public function setParent($parent)
    {
        $this->parent = $parent;
    }

    public function getTarget()
    {
        return $this->target;
    }

    protected function setTarget($target)
    {
        if (is_string($target)) {
            $this->isStringPath = true;
        }
        $this->target = $target;
    }

    public function getTargetPath()
    {
        if (is_string($this->getTarget())) {
            return $this->getTarget();
        }

        return $this->getTarget()->getRealPath();
    }

    public function getLocation()
    {

        if ($this->isStringPath) {
            return $this->getTarget();
        }


        return self::clearUrl($this->getTarget()->getRealPath());
    }

    protected static function clearUrl($url)
    {
        return str_replace('./', '', $url);
    }
}