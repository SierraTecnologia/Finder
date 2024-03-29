<?php

namespace Finder\Console\Commands\Verify;

use Operador\Actions\Instagram\GetMidias;
use Telefonica\Models\Digital\Account;
use Illuminate\Console\Command;
use Illuminate\Foundation\Inspiring;
use App\Plugins\Integrations\PhotoAcompanhante\Import;

class Data extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitec:verify:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Display an inspiring quote';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {

        $this->comment(PHP_EOL.Inspiring::quote().PHP_EOL);
        
        $account = Account::where('username', 'ricardosierra')->first();

        $accounts = Account::all();



        (new GetMidias($account))->prepare('carollnovais')->execute();
        (new GetStories($account))->prepare('carollnovais')->execute();
        (new GetFollowers($account))->prepare('carollnovais')->execute();
    }
}
