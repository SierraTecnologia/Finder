<?php
namespace Finder\Spider\Registrator;

use Finder\Spider\Abstracts\TargetManager;

use Informate\Models\Entytys\Digital\Midia\File;
use Finder\Models\Entytys\Digital\Internet\ComputerFile;

/**
 * Run all script analysers and outputs their result.
 */
class FileRegistrator extends TargetManager
{

    public function __construct($target, $parent = false)
    {
        parent::__construct($target, $parent);


        if (!ComputerFile::where('location', $this->getLocation())->first()) {
            ComputerFile::create($this->getArray());
        }
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
            'filename' => self::clearUrl($target->getFilename()),
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
            // 'file' => $target->getFile(),
            // 'dir' => $target->getDir(),
            // 'link' => $target->getLink(),
        ]);
    }

    public function registerAndReturnFile()
    {

        $md5 = md5($this->getTarget()->getContents());

        if ($file = File::where('location', $md5)->first()) {
            return $file;
        }

        return File::create([
            'location' => $md5,
            'name' => $this->getTarget()->getFilename()
        ]);
    }
}