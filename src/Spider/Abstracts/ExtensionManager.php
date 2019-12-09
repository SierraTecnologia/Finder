<?php
namespace Finder\Spider\Abstracts;

use Tracking\Abstracts\MetricManager;

use Finder\Spider\Traits\ExtensionManagerTrait;
use Finder\Helps\DebugHelper;
use Finder\Helps\CodeFileHelper;

/**
 * Outputs events information to the console.
 * @see TriggerableInterface
 */
abstract class ExtensionManager
{
    use ExtensionManagerTrait;

    public function __construct($file, MetricManager $metrics)
    {
        $this->setFile($file);
        DebugHelper::debug('File Manager'.$this->getFile());
        $this->run();

        $metrics->registerMetricCount('Extensions', CodeFileHelper::getClassName($this));
    }
}
