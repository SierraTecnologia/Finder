<?php
namespace Finder\Contracts\Spider;

use Tracking\Abstracts\MetricManager;

use Finder\Spider\Traits\ExtensionManagerTrait;
use Muleta\Helps\DebugHelper;
use Muleta\Helps\CodeFileHelper;

/**
 * Outputs events information to the console.
 *
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
