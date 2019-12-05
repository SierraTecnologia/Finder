<?php
namespace Finder\Spider\Registrator;

use Finder\Logic\Output\AbstractOutput;
use Finder\Logic\Output\Filter\OutputFilterInterface;
use Finder\Logic\Output\TriggerableInterface;

use Symfony\Component\Finder\Finder;
use Finder\Spider\Abstracts\Spider;
use Finder\Models\Entytys\Digital\Midia\Project;
use Finder\Models\Entytys\Digital\Internet\ComputerProject;

/**
 * Run all script analysers and outputs their result.
 */
class ProjectRegistrator
{
    protected $target = false;
    protected $isStringPath = false;

    public function __construct($target)
    {
        $this->setTarget($target);

        

        if (!ComputerProject::where('location', $this->getLocation())->first()) {
            ComputerProject::create($this->getArray());
        }
    }

    protected function setTarget($target)
    {
        if (is_string($target)) {
            $this->isStringPath = true;
        }
        $this->target = $target;
    }

    public function getTarget()
    {
        return $this->target;
    }

    public function getLocation()
    {

        if ($this->isStringPath) {
            return $this->getTarget();
        }


        return self::clearUrl($this->getTarget()->getRealPath());
    }

    protected function getArray()
    {
        $target = $this->getTarget();

        $array = [];


        if ($this->isStringPath) {
            return array_merge($array, [
                'location' => $target
            ]);
        }

        return array_merge($array, [
        
            // dd($target);
            'location' => $this->getLocation(),
            'path' => self::clearUrl($target->getPath()),
            'Projectname' => self::clearUrl($target->getProjectname()),
            'basename' => self::clearUrl($target->getBasename()),
            'pathname' => self::clearUrl($target->getPathname()),
            'extension' => self::clearUrl($target->getExtension()),
            'realPath' => self::clearUrl($target->getRealPath()),
            'aTime' => self::clearUrl($target->getATime()),
            'mTime' => self::clearUrl($target->getMTime()),
            'cTime' => self::clearUrl($target->getCTime()),
            'inode' => self::clearUrl($target->getInode()),
            'size' => self::clearUrl($target->getSize()),
            'perms' => self::clearUrl($target->getPerms()),
            'owner' => self::clearUrl($target->getOwner()),
            'group' => self::clearUrl($target->getGroup()),
            'type' => self::clearUrl($target->getType()),
            'writable' => $target->isWritable(),
            'readable' => $target->isReadable(),
            'executable' => $target->isExecutable(),
            // 'Project' => $target->getProject(),
            // 'dir' => $target->getDir(),
            // 'link' => $target->getLink(),
        ]);
    }

    public function registerAndReturnProject()
    {

        $md5 = md5($this->getTarget()->getContents());

        if ($Project = Project::where('location', $md5)->first()) {
            return $Project;
        }

        return Project::create([
            'location' => $md5,
            'name' => $this->getTarget()->getProjectname()
        ]);
    }

    private static function clearUrl($url)
    {
        return str_replace('./', '', $url);
    }
}