<?php
namespace Finder\Actions\Contracts\Spider;

use Finder\Spider\Traits\GroupManagerTrait;
use Support\Helps\DebugHelper;

/**
 * Outputs events information to the console.
 *
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
