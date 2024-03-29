<?php

namespace Finder\Pipelines\Finder;

use Operador\Contracts\Stage as StageBase;
use Finder\Pipelines\Builders\RepositoryBuilder;

class Project extends StageBase
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
                \Finder\Entities\RepositoryEntity::make($payload)
            );
        }

        return $payload;
    }
}