<?php

namespace Finder\Console\Commands\Spider;

use Operador\Actions\Instagram\GetMidias;
use Operador\Actions\Instagram\GetStories;
use Operador\Actions\Instagram\GetFollowers;
use Telefonica\Models\Digital\Account;
use Illuminate\Console\Command;
use Illuminate\Foundation\Inspiring;
use App\Plugins\Integrations\PhotoAcompanhante\Import;

use Storage;
use Finder\Pipelines\Builders\DirectoryBuilder;

class Directory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:finder:directorys';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Explorar Diretorios';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {

        $paths = [
            // '/sierra/Dev/Fodasse/bitcoin'
            // '/sierra/Dev'
            // '/Data'
            Storage::disk('sierra')->path('/1'),
            // Storage::disk('ordem')->path('/'),
            // Storage::disk('data')->path('/')
            // '/sierra/Driver'
        ];
        $pipeline = DirectoryBuilder::getPipelineWithOutput($this);

        foreach ($paths as $path) {
            // Process Pipeline
            $pipeline(
                \Finder\Entities\DirectoryEntity::make($path)
            );
        }
        
    }
}
