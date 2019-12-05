<?php
namespace Finder\Spider\Extensions;

use Finder\Logic\Output\AbstractOutput;
use Finder\Logic\Output\Filter\OutputFilterInterface;
use Finder\Logic\Output\TriggerableInterface;

use Symfony\Component\Finder\Finder;
use Finder\Spider\Abstracts\Spider;
use Finder\Models\Entytys\Digital\Midia\File;
use Finder\Models\Entytys\Digital\Internet\ComputerFile;

use Finder\Spider\Abstracts\FileManager;

/**
 * Run all script analysers and outputs their result.
 */
class Json extends FileManager
{
    protected $identificadores = [
        \Finder\Spider\Identificadores\ComposerFile::class,
    ];
}