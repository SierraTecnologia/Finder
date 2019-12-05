<?php
namespace Finder\Spider\Traits;

use Finder\Logic\Output\AbstractOutput;
use Finder\Logic\Output\Filter\OutputFilterInterface;
use Finder\Logic\Output\TriggerableInterface;

use Symfony\Component\Finder\Finder;
use Finder\Spider\Abstracts\Spider;
use Finder\Models\Entytys\Digital\Midia\File;
use Finder\Models\Entytys\Digital\Internet\ComputerFile;

use Finder\Logic\Analyser;

use Finder\Helps\DebugHelper;

/**
 * Outputs events information to the console.
 * @see TriggerableInterface
 */
trait MetricManagerTrait
{

    public $metrics = [];

    /**
     * Lógica
     */
    protected function run()
    {
        DebugHelper::debug('Run MetricManager!');
        return true;
    }

    /**
     * Type pode ser: Extensions, Identificadores, Groups
     */
    public function registerMetric($type)
    {

    }
}
