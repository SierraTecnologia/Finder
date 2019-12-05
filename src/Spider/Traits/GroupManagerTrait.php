<?php
namespace Finder\Spider\Traits;

use Finder\Logic\Output\AbstractOutput;
use Finder\Logic\Output\Filter\OutputFilterInterface;
use Finder\Logic\Output\TriggerableInterface;

use Symfony\Component\Finder\Finder;
use Finder\Spider\Abstracts\Spider;
use Finder\Models\Entytys\Digital\Midia\File;
use Finder\Models\Entytys\Digital\Internet\ComputerFile;

use Finder\Logic\Analyser;

use Finder\Helps\DebugHelper;

/**
 * Outputs events information to the console.
 * @see TriggerableInterface
 */
trait GroupManagerTrait
{
    protected $group = false;

    protected function setGroup($group)
    {
        if (is_string($group)) {
            $this->stringPath = true;
        }
        $this->group = $group;
    }

    public function getGroup()
    {
        return $this->group;
    }

    public function getContents()
    {
        return $this->getFile()->getContents();
    }

    /**
     * Lógica
     */
    protected function run()
    {
        DebugHelper::debug('Run GroupManager '.$this->getFile());
        
        return true;
    }
}
