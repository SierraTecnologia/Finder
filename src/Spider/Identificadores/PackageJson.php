<?php
namespace Finder\Spider\Identificadores;

use Finder\Logic\Output\AbstractOutput;
use Finder\Logic\Output\Filter\OutputFilterInterface;
use Finder\Logic\Output\TriggerableInterface;

use Symfony\Component\Finder\Finder;
use Finder\Contracts\Spider\Spider;
use Stalker\Models\File;
use Finder\Models\Digital\Internet\ComputerFile;

use Finder\Contracts\Spider\IdentificadorManager;

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