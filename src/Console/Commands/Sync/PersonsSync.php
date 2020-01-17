<?php

namespace Finder\Console\Commands\Sync;

use Illuminate\Console\Command;
use Population\Models\Identity\Actors\Person;
use Finder\Spider\Track\PersonTrack;

class PersonsSync extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:persons';

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
        $persons = Person::all();
        foreach ($persons as $person) {
            $track = new PersonTrack($person);
            $track->exec();
        }
    }
}
