<?php

namespace Finder\Actions\Finder;

use Support\Contracts\Runners\Stage as StageBase;
use Finder\Actions\Builders\RepositoryBuilder;

class Account extends StageBase
{
    protected $finder = false;

    // Have
    protected $files = [];
    protected $directorys = [];


    public function __invoke($payload)
    {
        // find all files in the current directory
        $targetPath = $payload->getTargetPath();
        $this->info('Analisando Projeto: '.$targetPath);

        if(file_exists($targetPath.'/.git')) {
            $pipeline = RepositoryBuilder::getPipelineWithOutput($this->getOutput());
            // Process Pipeline
            return $pipeline(
                \Finder\Entitys\RepositoryEntity::make($payload)
            );
        }

        return $payload;
    }
}