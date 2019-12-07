<?php
namespace Finder\Spider\Extensions;

use Informate\Models\Entytys\Digital\Midia\File;
use Population\Models\Entytys\Digital\Internet\ComputerFile;

use Finder\Spider\Abstracts\ExtensionManager;

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