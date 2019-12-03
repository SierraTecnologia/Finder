<?php
namespace Finder\Logic\Spider;

use Finder\Logic\Output\AbstractOutput;
use Finder\Logic\Output\Filter\OutputFilterInterface;
use Finder\Logic\Output\TriggerableInterface;

use Symfony\Component\Finder\Finder;

/**
 * Run all script analysers and outputs their result.
 */
abstract class Spider
{
    protected $target = false;
    protected $parent = false;

    public function __construct($target, $parent = false)
    {
        $this->target = $target;
        $this->parent = $parent;
    }

    public function getUniqueIdentify()
    {
        // @todo reescrever
        return $target->getTargetPath();
    }

    public function getTargetPath()
    {
        if (is_string($this->target)) {
            return $this->target;
        }

        return $this->target->getRealPath();
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

    /**
     * List of PHP analys integration classes.
     * @return string[] array of class names.
     */
    public static function getAnalysisToolsClasses()
    {
        return [
            'Finder\Logic\Tools\CodeSniffer',
            'Finder\Logic\Tools\CopyPasteDetector',
            'Finder\Logic\Tools\MessDetector',
        ];
    }
}