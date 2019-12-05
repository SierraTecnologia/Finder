<?php
namespace Finder\Spider\Abstracts;

use Finder\Spider\Traits\FileManagerTrait;
use Finder\Helps\DebugHelper;

/**
 * Outputs events information to the console.
 * @see TriggerableInterface
 */
abstract class FileManager
{
    use FileManagerTrait;

    public function __construct($file)
    {
        $this->setFile($file);
        DebugHelper::debug('File Manager'.$this->getFile());
        $this->run();
    }
}
