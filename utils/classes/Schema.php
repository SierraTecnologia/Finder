<?php 

use Illuminate\Database\Capsule\Manager as Capsule;
use Finder\Helps\DebugHelper;

class Schema
{
    public static function hasTable($name)
    {
        return Capsule::schema()->hasTable($name);
    }

    public static function create($name, $function)
    {
        DebugHelper::warning("Executando Migrate: ".$name);
        
        if (Capsule::schema()->hasTable($name)) {
            return true;
        }
        return Capsule::schema()->create($name, $function);
    }
}