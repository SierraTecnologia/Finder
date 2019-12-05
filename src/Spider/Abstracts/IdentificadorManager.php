<?php
namespace Finder\Spider\Abstracts;

use Finder\Spider\Traits\IdentificadorManagerTrait;
use Finder\Helps\DebugHelper;

/**
 * Outputs events information to the console.
 * @see TriggerableInterface
 */
abstract class IdentificadorManager
{
    use IdentificadorManagerTrait;

    public function __construct(FileManager $extension)
    {
        $this->setExtension($extension);
        DebugHelper::debug('Identificador Manager'.$this->getFile());
        $this->run();
    }
}
