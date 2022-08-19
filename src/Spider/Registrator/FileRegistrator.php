<?php
namespace Finder\Spider\Registrator;

use Finder\Contracts\Spider\TargetManager;

use MediaManager\Models\File;
use Finder\Models\Digital\Internet\ComputerFile;

/**
 * Run all script analysers and outputs their result.
 */
class FileRegistrator extends TargetManager
{
    protected $file = false;
    protected $computerFile = false;

    public function __construct($target, $parent = false)
    {
        parent::__construct($target, $parent);

        $computer = $this->returnComputerFile();
        // @todo Verificar se alterou o arquivo e gravar o novo arquivo
    }

    private function returnComputerFile()
    {
        if ($this->computerFile) {
            return $this->computerFile;
        }

        if (!$this->computerFile = ComputerFile::where('location', $this->getLocation())->first()) {
            $this->computerFile = ComputerFile::create($this->getArray());
        }
        
        return $this->computerFile;
    }

    protected function returnFile()
    {
        if ($this->file) {
            return $this->file;
        }

        $md5 = md5($this->getTarget()->getContents());

        if ($this->file = File::where('location', $md5)->first()) {
            return $this->file;
        }

        return $this->file = File::create(
            [
            'location' => $md5,
            'name' => $this->getTarget()->getFilename()
            ]
        );
    }

    /**
     * @return array
     *
     * @psalm-return array{file_id: mixed, location: mixed, path?: mixed, filename?: mixed, basename?: mixed, pathname?: mixed, extension?: mixed, realPath?: mixed, aTime?: mixed, mTime?: mixed, cTime?: mixed, inode?: mixed, size?: mixed, perms?: mixed, owner?: mixed, group?: mixed, type?: mixed, writable?: mixed, readable?: mixed, executable?: mixed}
     */
    private function getArray(): array
    {
        $target = $this->getTarget();

        $array = [
            'file_id' => $this->returnFile()->id,
        ];

        if ($this->isStringPath) {
            return array_merge(
                $array, [
                'location' => $target
                ]
            );
        }

        return array_merge(
            $array, [
        
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

            'title' => $target->getClientOriginalName(),
            'extension' => $target->guessClientExtension(),
            'size' => $target->getClientSize(),
            'mime' => $target->getClientMimeType(),
            'hash' => md5_file($target->getRealPath()),
            // 'file' => $target->getFile(),
            // 'dir' => $target->getDir(),
            // 'link' => $target->getLink(),
            ]
        );
    }
}