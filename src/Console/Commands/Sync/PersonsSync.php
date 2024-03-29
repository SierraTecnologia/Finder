<?php

namespace Finder\Console\Commands\Sync;

use Illuminate\Console\Command;
use Telefonica\Models\Actors\Person;
use Finder\Pipelines\Track\PersonTrack;

class PersonsSync extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitec:sync:persons';

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
     * @return void
     */
    public function handle(): void
    {
        $count = 0;
        $countTotal = Person::count();
        $persons = Person::all();
        foreach ($persons as $person) {
            ++$count;
            
            $this->info('['.$count.'/'.$countTotal.'] Trackiando Pessoa: '. $person->name);
            $track = new PersonTrack($person);
            $track->exec();
        }
    }
}
