<?php

namespace Finder\Console\Routine\Social;

use Illuminate\Console\Command;
use Finder\Models\MediaSend;
use Finder\Models\MediaEmail;
use Finder\Models\MediaPush;
use Finder\Models\Company;
use Finder\Models\User;
use SendGrid;
use Finder\Http\Controllers\Api\Controller;

class RoutineImport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'routine:importAll';

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
        // (new \Finder\Routines\Globals\BackupAll)->run();
        (new \Finder\Routines\Globals\ImportTokens)->run();
    }
}
