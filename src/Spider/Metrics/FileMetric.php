<?php
namespace Finder\Spider\Metrics;

use Finder\Spider\Abstracts\MetricManager;

/**
 * Run all script analysers and outputs their result.
 */
class FileMetric extends MetricManager
{
    static protected $metricTypes = [
        "Extensions",
        "Identificadores",
        "Groups",
    ];

}