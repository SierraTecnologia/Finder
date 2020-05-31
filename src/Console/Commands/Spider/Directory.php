<?php

namespace Finder\Console\Commands\Spider;

use Finder\Actions\Instagram\GetMidias;
use Finder\Actions\Instagram\GetStories;
use Finder\Actions\Instagram\GetFollowers;
use Population\Models\Identity\Digital\Account;
use Illuminate\Console\Command;
use Illuminate\Foundation\Inspiring;
use App\Plugins\Integrations\PhotoAcompanhante\Import;

class Directory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitec:spider:directorys';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Explorar Diretorios';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $pipeline = \Finder\Pipelines\Finder\Directory::pipeline();

        $paths = [
            '/sierra'
        ];
        foreach ($paths as $path) {
            $pipeline->process(
                \Finder\Entitys\DirectoryEntity::make($path)
            );
        }
        
    }
}
