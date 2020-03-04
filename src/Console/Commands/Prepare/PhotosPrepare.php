<?php

namespace Finder\Console\Commands\Prepare;

use Illuminate\Console\Command;
use Population\Models\Identity\Actors\Person;
use Finder\Spider\Track\PersonTrack;
use Illuminate\Support\Facades\Storage;
use Finder\Models\Digital\Midia\Imagen;

class PhotosPrepare extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'prepare:photos';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Importar a porra toda !';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $folder = 'midia';
        
        // dd(Storage::files($folder));
        // dd(Storage::allFiles($folder));
        $directorys = Storage::directories($folder);

        foreach ($directorys as $directory) {
            $directoryName = explode('/', $directory);
            $person = Person::createIfNotExistAndReturn($directoryName[count($directoryName)-1]);
            $this->importFromFolder($person, $directory);
        }
    }

    /**
     * Tirardaqui
     */
    public function getDisk()
    {
        // @todo usar config
        return 'local';
    }

    /**
     * Tirardaqui
     */
    public function importFromFolder($target, $folder)
    {
        $files = Storage::allFiles($folder);
        // dd('oi', $files);
        foreach ($files as $file) {

            $fileName = explode('/', $file);
            $fileName = $fileName[count($fileName)-1];

            Imagen::createByMediaFromDisk(
                $this->getDisk(),
                $file,
                $target,
                [
                    'name' => $fileName,
                    'fingerprint' => $fileName
                ]
            );

            // $this->count = $this->count + 1;
        }
    }
}
