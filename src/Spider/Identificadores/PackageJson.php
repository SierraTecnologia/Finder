<?php
namespace Finder\Spider\Identificadores;

use Finder\Logic\Output\AbstractOutput;
use Finder\Logic\Output\Filter\OutputFilterInterface;
use Finder\Logic\Output\TriggerableInterface;

use Symfony\Component\Finder\Finder;
use Finder\Spider\Abstracts\Spider;
use Finder\Models\Entytys\Digital\Midia\File;
use Finder\Models\Entytys\Digital\Internet\ComputerFile;

use Finder\Spider\Abstracts\IdentificadorManager;

/**
 * Run all script analysers and outputs their result.
 */
class PackageJson extends IdentificadorManager
{

    /**
     * Identificar Group para a Pasta Pai
     */
    public static $groups = [
        \Finder\Spider\Groups\Project::class,
    ];

    /**
     * If is Composer Package
     */
    public function identify()
    {
        if ($this->getFile()->getFilename()!=='package.json') {
            return false;
        }

        return true;
    }

    public function collectDataEstrutura()
    {
        return [
            "author",
        ];
    }
}