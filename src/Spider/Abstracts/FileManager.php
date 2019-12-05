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
use Finder\Spider\Traits\FileManagerTrait;


/**
 * Outputs events information to the console.
 * @see TriggerableInterface
 */
abstract class FileManager
{
    use FileManagerTrait;

    public function __construct($file)
    {
        $this->setFile($file);
        $json = json_decode($file->getContents());


        dd($file->getFilename());
        dd($file, $json);
    }
}
