<?php

namespace Finder\Pipelines\Identify;

use League\Pipeline\Pipeline;
use Operador\Contracts\StageInterface;
use Support\Analysator\Information\Group\EloquentGroup;

class RespectiveModel
{


    public static function run($abouts, $file)
    {
        
        $groupType = false;
        foreach ($abouts as $about) {
            $groupType = EloquentGroup::discoverType($about, true);
        }

        if (!$groupType) {
            return false;
        }

        $name = explode('-', $file);

        return call_user_func(
            $groupType.'::discoverModel',
            $name[0]
        );
    }
        
}