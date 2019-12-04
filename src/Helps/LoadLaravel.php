<?php
namespace Finder\Helps;

use Illuminate\Contracts\Console\Kernel;

use Symfony\Component\Finder\Finder;


/**
 * Array helper.
 */
class LoadLaravel
{
    public static $migrationsPaths = [
        __DIR__.'/../../vendor/sierratecnologia/informate/src/Migrations/',
        __DIR__.'/../../vendor/sierratecnologia/population/src/Migrations/',
        __DIR__.'/../../src/Migrations/',
    ];
    /**
     * 
     */
    public function init()
    {
        // if (!function_exists('config')) {
        //     function config($address, $defaultValue) {
        //         return $defaultValue;
        //     }
        // }
        
        // $exitCode = (new Kernel)->call('migrate:refresh', [
        //     '--force' => true,
        // ]);


        $getAllFilesMigrations = $this->runMIgrations();



    }



    public function runMIgrations()
    {
        $finder = new Finder();
        $finder->in(self::$migrationsPaths)->files()->sortByName();
        
        // check if there are any search results
        if (!$finder->hasResults()) {
            echo 'No Migrations: '.$path;

            return [];
        }

        foreach ($finder as $file) {
            include $file->getPathname();
            $fileName = explode('_', $file->getFilename());
            $className = '';
            foreach ($fileName as $partName) {
                if (!is_numeric($partName)) {
                    $className .= ucfirst($partName);
                }
            }
            $className = str_replace('.php', '', $className);
            $instanceClass = new $className;
            $instanceClass->up();
        }

        return $finder;
    }

}