<?php

namespace Finder\Console\Commands\Prepare;

use Illuminate\Console\Command;
use Population\Models\Identity\Actors\Person;
use Finder\Spider\Track\PersonTrack;
use Illuminate\Support\Facades\Storage;
use Finder\Models\Digital\Midia\Imagen;

use Rap2hpoutre\FastExcel\FastExcel;

class ExcelPrepare extends Command
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
        $folder = 'import';
        $this->importFromFolder($folder);
    }

    /**
     * Tirardaqui
     */
    public function importFromFolder($folder)
    {
        $files = Storage::allFiles($folder);
        // dd('oi', $files);
        foreach ($files as $file) {

            $fileName = explode('/', $file);
            $fileName = $fileName[count($fileName)-1];

            // $collection = (new FastExcel)->configureCsv(';', '#', '\n', 'gbk')->import($file);
            $users = (new FastExcel)->import(
                $file, function ($line) {
                    dd($line);
                    $class = \Casa\Models\Economic\Gasto::class;
                    // return User::create([
                    //     'name' => $line['Name'],
                    //     'email' => $line['Email']
                    // ]);
                }
            );

            // Imagen::createByMediaFromDisk(
            //     $this->getDisk(),
            //     $file,
            //     $target,
            //     [
            //         'name' => $fileName,
            //         'fingerprint' => $fileName
            //     ]
            // );

            // $this->count = $this->count + 1;
        }
    }
}
