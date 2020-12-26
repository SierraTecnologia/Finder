<?php

namespace Finder\Pipelines\Finder;

use League\Pipeline\Pipeline;
use Operador\Contracts\StageInterface;

use Symfony\Component\Finder\Finder;
use Support\Helps\DebugHelper;
use Operador\Contracts\Stage as StageBase;
use Finder\Pipelines\Builders\DirectoryBuilder;
use Finder\Pipelines\Builders\ProjectBuilder;

class Directory extends StageBase
{
    protected $finder = false;

    // Have
    protected $files = [];
    protected $directorys = [];


    public function __invoke($payload)
    {
        // find all files in the current directory
        $targetPath = $payload->getTargetPath();
        $this->info('Analisando Pasta: '.$targetPath);

        $finder = $this->getFinder($targetPath);
        // check if there are any search results
        if (!$finder->hasResults()) {
            $this->info('No Results: '.$targetPath);
            return $payload;
        }

        /**
         * Mappers
         */
        foreach ($finder as $file) {
            if ($file->getType() == 'file') {
                $payload->files[$file->getBasename()] = $file;
            } else {
                $payload->directorys[$file->getBasename()] = $file;
            }
        }

        /**
         * Caso seja Projeto
         */
        if($payload->isProject()) {
            $pipeline = ProjectBuilder::getPipelineWithOutput($this->getOutput());
            // Process Pipeline
            return $pipeline(
                \Fabrica\Entities\ProjectEntity::make($payload)
            );
        }

        /**
         * Sub Pipelines
         */
        $pipeline = DirectoryBuilder::getPipelineWithOutput($this->getOutput());
        foreach ($payload->directorys as $directory) {
            $this->info('Process Pasta: '.$directory->getRealPath());
            $pipeline->process(
                \Fabrica\Entities\DirectoryEntity::make($directory->getRealPath())
            );
        }
        return $payload;


    }



    public function getTargetPath()
    {
    }



    public function getFinder($targetPath, $fast = true)
    {
        $finder = false;
        try {
            if (!$finder) {
                $finder = new Finder();
                $finder->ignoreUnreadableDirs();
                if ($fast) {
                    if (file_exists($targetPath.'gitignore')) {
                        // excludes files/directories matching the .gitignore patterns
                        $finder->ignoreVCSIgnored(true);
                    }
                }
                // Ignorar Recursividade
                $finder->depth('== 0');
                // Buscar Pastas e Arquivos
                $finder->in($targetPath);
            }
        } catch (\Symfony\Component\Finder\Exception\DirectoryNotFoundException $e) {
            DebugHelper::warning('Diretório não existe: '. $e->getMessage());
        } catch (Exception $e) {
            DebugHelper::warning('Exceção capturada: '. $e->getMessage());
        }

        return $finder;
    }
}