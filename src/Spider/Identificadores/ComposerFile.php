<?php
namespace Finder\Spider\Identificadores;

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
class ComposerFile extends FileManager
{

    /**
     * If is Composer Package
     */
    public function identify()
    {
        if (!$this->getFile()->getFilename()=='composer.json') {
            return false;
        }

        return true;
    }
}