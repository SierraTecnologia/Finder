<?php 

use Illuminate\Database\Capsule\Manager as Capsule;

class Schema
{
    public static function hasTable($name)
    {
        return Capsule::schema()->hasTable($name);
    }

    public static function create($name, $function)
    {
        echo "\nExecutando Migrate: ".$name;
        
        if (Capsule::schema()->hasTable($name)) {
            return true;
        }
        return Capsule::schema()->create($name, $function);
    }
}