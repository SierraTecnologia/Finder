<?php

namespace Finder\Console\Commands\Sync;

use Illuminate\Console\Command;
use Population\Models\MediaSend;
use Population\Models\MediaEmail;
use Population\Models\MediaPush;
use Population\Models\Company;
use Population\Models\User;
use SendGrid;
use Finder\Http\Controllers\Api\Controller;
use Operador\Routines\Globals\ImportTokens;

class TokensSync extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitec:sync:tokens';

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
        // (new \Operador\Routines\Globals\BackupAll)->run();
        $importTokens = ImportTokens::makeWithOutput($this);
        $importTokens->run($this);
    }
}
