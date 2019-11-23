<?php

namespace SiFinder\Console\Routine\Social;

use Illuminate\Console\Command;
use SiFinder\Models\MediaSend;
use SiFinder\Models\MediaEmail;
use SiFinder\Models\MediaPush;
use SiFinder\Models\Company;
use App\Models\User;
use SendGrid;
use SiFinder\Http\Controllers\Api\Controller;

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
        // (new \SiFinder\Routines\Globals\BackupAll)->run();
        (new \SiFinder\Routines\Globals\ImportTokens)->run();
    }
}
