<?php
namespace Finder\Spider\Identificadores;

use Finder\Logic\Output\AbstractOutput;
use Finder\Logic\Output\Filter\OutputFilterInterface;
use Finder\Logic\Output\TriggerableInterface;

use Symfony\Component\Finder\Finder;
use Finder\Spider\Abstracts\Spider;
use Informate\Models\Entytys\Digital\Midia\File;
use Population\Models\Entytys\Digital\Internet\ComputerFile;

use Finder\Spider\Abstracts\IdentificadorManager;

/**
 * Run all script analysers and outputs their result.
 */
class ComposerFile extends IdentificadorManager
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
        if ($this->getFile()->getFilename()!=='composer.json') {
            return false;
        }

        return true;
    }

    public function collectDataEstrutura()
    {
        return [
            "name",
            "description",
            "license",
            "authors" => [
                "name",
                "email",
            ],
            "require" => [
                "project" => 'version'
            ],
        ];
    }
}