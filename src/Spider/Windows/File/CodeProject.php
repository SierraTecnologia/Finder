<?php
namespace Finder\Spider\Windows\File;

use Finder\Logic\Output\AbstractOutput;
use Finder\Logic\Output\Filter\OutputFilterInterface;
use Finder\Logic\Output\TriggerableInterface;

/**
 * Run all script analysers and outputs their result.
 */
class CodeProject
{
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