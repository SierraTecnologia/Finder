<?php
namespace Finder\Spider\Abstracts;

use Finder\Spider\Traits\IdentificadorManagerTrait;
use Finder\Helps\DebugHelper;
use Finder\Spider\Abstracts\ExtensionManager;

/**
 * Outputs events information to the console.
 * @see TriggerableInterface
 */
abstract class IdentificadorManager
{
    use IdentificadorManagerTrait;

    public function __construct(ExtensionManager $extension)
    {
        $this->setExtension($extension);
        DebugHelper::debug('Identificador Manager'.$this->getFile());
        $this->run();
    }
}
