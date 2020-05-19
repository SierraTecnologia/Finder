<?php
namespace Finder\Spider\Extensions;

use Finder\Contracts\Spider\ExtensionManager;

/**
 * Run all script analysers and outputs their result.
 */
class Json extends ExtensionManager
{
    static protected $identificadores = [
        \Finder\Spider\Identificadores\ComposerFile::class,
        \Finder\Spider\Identificadores\PackageJson::class,
    ];

    /**
     * Referente ao Json
     */
    public function getContents()
    {
        return json_decode(parent::getContents(), true);
    }
}