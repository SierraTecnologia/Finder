<?php
namespace Finder\Spider\Windows;

use Finder\Logic\Output\AbstractOutput;
use Finder\Logic\Output\Filter\OutputFilterInterface;
use Finder\Logic\Output\TriggerableInterface;

use Finder\Helps\DebugHelper;

/**
 * Run all script analysers and outputs their result.
 */
class Directory
{

    public function run()
    {

        $contents = $filesystem->listContents($path, $recursive);
        foreach ($contents as $object) {
            DebugHelper::info($object['basename'].' is located at '.$object['path'].' and is a '.$object['type']);
        }
        
    }
}