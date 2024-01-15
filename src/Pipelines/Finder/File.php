<?php

namespace Finder\Pipelines\Finder;

use League\Pipeline\Pipeline;
use Operador\Contracts\StageInterface;

use Symfony\Component\Finder\Finder;
use Muleta\Helps\DebugHelper;
use Operador\Contracts\Stage as StageBase;
use Finder\Pipelines\Builders\DirectoryBuilder;
use Finder\Pipelines\Builders\ProjectBuilder;
use MediaManager\Models\File as FileModel;
use MediaManager\Services\FileService;

class File extends StageBase
{


    public function __invoke($payload)
    {
        // find all files in the current directory
        $targetPath = $payload->getTargetPath();
        $this->info('Analisando Arquivo: '.$targetPath);
        $hash = md5_file($targetPath);
        $file = FileModel::where([
            'path' => $targetPath,
            'hash' => $hash,
        ])->first();
        if (!$file) {
            $mine = FileService::getMime(
                $targetPath
            );
            $filePayload = [];
            $filePayload['name'] = $targetPath;
            // $filePayload['filesystem'] = $this->storage;
            $filePayload['unique_hash'] = md5_file($targetPath);
            $filePayload['hash'] = md5_file($targetPath);
            $filePayload['path'] = $targetPath;
            $filePayload['mime'] = $mine;
            // $filePayload['size'] = Storage::disk($this->storage)->size($targetPath);
            // $filePayload['last_modified'] = Storage::disk($this->storage)->lastModified($targetPath);
            $filePayload['type'] = 'file';  // folder ou file
            $file = FileModel::create(
                $filePayload
            );
        }
    }


}