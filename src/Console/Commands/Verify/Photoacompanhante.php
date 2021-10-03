<?php

namespace Finder\Console\Commands\Verify;

use Illuminate\Console\Command;
use Illuminate\Foundation\Inspiring;
use Integrations\Connectors\PhotoAcompanhante\Import;

class Photoacompanhante extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitec:verify:photoacompanhante';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Display an inspiring quote';

    /**
     * Call fire function
     *
     * @return void
     */
    public function handle()
    {
        $this->fire();
    }
    
    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire(): void
    {
        $this->comment(PHP_EOL.Inspiring::quote().PHP_EOL);

        (new Import())->slaves();
    }
}
