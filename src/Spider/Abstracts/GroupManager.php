<?php
namespace Finder\Spider\Abstracts;

use Finder\Spider\Traits\GroupManagerTrait;
use Finder\Helps\DebugHelper;

/**
 * Outputs events information to the console.
 * @see TriggerableInterface
 */
abstract class GroupManager
{
    use GroupManagerTrait;

    public function __construct($group)
    {
        $this->setGroup($group);
        DebugHelper::debug('Group Manager'.$this->getFile());
        $this->run();
    }
}
