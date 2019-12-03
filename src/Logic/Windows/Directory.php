<?php
namespace Finder\Logic\Windows;

use Finder\Logic\Output\AbstractOutput;
use Finder\Logic\Output\Filter\OutputFilterInterface;
use Finder\Logic\Output\TriggerableInterface;
/**
 * Run all script analysers and outputs their result.
 */
class Directory
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

    public function run()
    {

        $contents = $filesystem->listContents($path, $recursive);
        foreach ($contents as $object) {
            echo $object['basename'].' is located at '.$object['path'].' and is a '.$object['type'];
        }
        
    }
}