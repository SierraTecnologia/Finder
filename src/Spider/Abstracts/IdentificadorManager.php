<?php
namespace Finder\Spider\Abstracts;

use Finder\Logic\Output\AbstractOutput;
use Finder\Logic\Output\Filter\OutputFilterInterface;
use Finder\Logic\Output\TriggerableInterface;

use Symfony\Component\Finder\Finder;
use Finder\Spider\Abstracts\Spider;
use Finder\Models\Entytys\Digital\Midia\File;
use Finder\Models\Entytys\Digital\Internet\ComputerFile;

use Finder\Logic\Analyser;
use Finder\Spider\Traits\IdentificadorManagerTrait;

use Finder\Helps\DebugHelper;

/**
 * Outputs events information to the console.
 * @see TriggerableInterface
 */
abstract class IdentificadorManager
{
    use IdentificadorManagerTrait;

    public function __construct(FileManager $extension)
    {
        $this->setExtension($extension);
        $this->run();
    }
}
