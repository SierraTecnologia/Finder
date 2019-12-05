<?php
namespace Finder\Spider\Traits;

use Finder\Spider\Abstracts\MetricManager;

use Finder\Models\Entytys\Digital\Midia\File;
use Finder\Models\Entytys\Digital\Internet\ComputerFile;

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
    public function registerMetricCount($type, $group, $sum = 1)
    {
        if (!isset($this->metrics[$type])) {
            $this->metrics[$type] = [];
        }

        if (!isset($this->metrics[$type][$group])) {
            $this->metrics[$type][$group] = 0;
        }

        return $this->metrics[$type][$group] += $sum;
    }
    public function mergeWith($mergeWith)
    {
        $this->metrics = array_merge_recursive($this->metrics, $mergeWith);

    }

    public function saveAndReturnArray()
    {
        $this->save();
        return $this->returnMetrics();
    }

    protected function save()
    {
        return $this->metrics;
    }

    protected function returnMetrics()
    {
        return $this->metrics;
    }

}
