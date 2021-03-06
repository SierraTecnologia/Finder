<?php

namespace Finder\Pipelines\Builders;

use League\Pipeline\Pipeline;
use Operador\Contracts\StageInterface;

use Operador\Contracts\PipelineBuilder;

use Finder\Pipelines\Finder\Repository;

class RepositoryBuilder extends PipelineBuilder
{
    public static function getPipelineWithOutput($output)
    {
        $builder = self::makeWithOutput($output);
        $builder
            ->add(Repository::makeWithOutput($builder->getOutput()));

        return $builder->build();
    }
}