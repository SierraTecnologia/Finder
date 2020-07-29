<?php

namespace Finder\Pipelines\Builders;

use League\Pipeline\Pipeline;
use Operador\Contracts\StageInterface;

use Operador\Contracts\PipelineBuilder;

use Finder\Pipelines\Finder\Project;

class ProjectBuilder extends PipelineBuilder
{
    public static function getPipelineWithOutput($output)
    {
        $builder = self::makeWithOutput($output);
        $builder
            ->add(Project::makeWithOutput($builder->getOutput()));

        return $builder->build();
    }
}