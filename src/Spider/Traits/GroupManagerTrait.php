<?php
namespace Finder\Spider\Traits;

use Muleta\Helps\DebugHelper;

/**
 * Outputs events information to the console.
 *
 * @see TriggerableInterface
 */
trait GroupManagerTrait
{
    protected $group = false;

    protected function setGroup($group)
    {
        $this->group = $group;
    }

    public function getGroup()
    {
        return $this->group;
    }

    /**
     * Lógica
     */
    protected function run()
    {
        DebugHelper::debug('Run GroupManager !');
        
        return true;
    }
}
