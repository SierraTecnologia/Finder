<?php
namespace Finder\Contracts\Spider;

use Finder\Spider\Traits\IdentificadorManagerTrait;
use Support\Helps\DebugHelper;
use Finder\Contracts\Spider\ExtensionManager;

/**
 * Outputs events information to the console.
 *
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
