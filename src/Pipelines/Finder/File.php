<?php

namespace Finder\Pipelines\Finder;

use League\Pipeline\Pipeline;
use Operador\Contracts\StageInterface;

use Symfony\Component\Finder\Finder;
use Muleta\Helps\DebugHelper;
use Operador\Contracts\Stage as StageBase;
use Finder\Pipelines\Builders\DirectoryBuilder;
use Finder\Pipelines\Builders\ProjectBuilder;

class File extends StageBase
{


    public function __invoke($payload)
    {
        // find all files in the current directory
        $targetPath = $payload->getTargetPath();
        $this->info('Analisando Arquivo: '.$targetPath);

        // /**
        //  * Caso seja Projeto
        //  */
        // if($payload->isProject()) {
        //     $pipeline = ProjectBuilder::getPipelineWithOutput($this->getOutput());
        //     // Process Pipeline
        //     return $pipeline(
        //         \Fabrica\Entities\ProjectEntity::make($payload)
        //     );
        // }



    }


}