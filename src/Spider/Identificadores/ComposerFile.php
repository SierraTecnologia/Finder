<?php
namespace Finder\Spider\Identificadores;

use Finder\Logic\Output\AbstractOutput;
use Finder\Logic\Output\Filter\OutputFilterInterface;
use Finder\Logic\Output\TriggerableInterface;

use Symfony\Component\Finder\Finder;
use Finder\Contracts\Spider\Spider;
use MediaManager\Models\File;
use Finder\Models\Digital\Internet\ComputerFile;

use Finder\Contracts\Spider\IdentificadorManager;

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
     *
     * @return bool
     */
    public function identify(): bool
    {
        if ($this->getFile()->getFilename()!=='composer.json') {
            return false;
        }

        return true;
    }

    /**
     * @return (string|string[])[]
     *
     * @psalm-return array{0: 'name', 1: 'description', 2: 'license', authors: array{0: 'name', 1: 'email'}, require: array{project: 'version'}}
     */
    public function collectDataEstrutura(): array
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