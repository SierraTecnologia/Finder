<?php

namespace Finder\Console\Commands\Spider;

use Operador\Actions\Instagram\GetMidias;
use Operador\Actions\Instagram\GetStories;
use Operador\Actions\Instagram\GetInbox;
use Operador\Actions\Instagram\GetFollowers;
use Telefonica\Models\Digital\Account;
use Illuminate\Console\Command;
use Illuminate\Foundation\Inspiring;
use App\Plugins\Integrations\PhotoAcompanhante\Import;

class InstagramGetAll extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:finder:getall';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Procura por dados no instagram';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {

        // $this->comment(PHP_EOL.Inspiring::quote().PHP_EOL);
        
        $account = Account::where('username', 'ricardorsierra')->first();

        (new GetInbox($account))->prepare('ricardorsierra')->execute();
        // (new GetFollowers($account))->prepare('graziely_goncalves_')->execute();
        // (new GetMidias($account))->prepare('graziely_goncalves_')->execute();
        // (new GetStories($account))->prepare('jean_grey380')->execute();
    }
}
