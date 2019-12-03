<?php

if (!function_exists('config')) {
    function config($address, $defaultValue) {
        return $defaultValue;
    }

    $capsule = new \Illuminate\Database\Capsule\Manager;
    $capsule->addConnection([
    
       "driver" => "sqlite",
    
       "host" => "127.0.0.1",
    
       "database" => __DIR__."/../../database.sqlite",
    
    //    "username" => "root",
    
    //    "password" => ""
    
    ]);
    
    //Make this Capsule instance available globally.
    $capsule->setAsGlobal();
    
    // Setup the Eloquent ORM.
    $capsule->bootEloquent();
    
    
    echo 'Aqui';
}