<?php
namespace Finder\Logic\Spider;

use Finder\Logic\Output\AbstractOutput;
use Finder\Logic\Output\Filter\OutputFilterInterface;
use Finder\Logic\Output\TriggerableInterface;

use Symfony\Component\Finder\Finder;

/**
 * Run all script analysers and outputs their result.
 */
class File extends Spider
{
    protected $target = [];

    public function __construct($target)
    {
        $this->target = $target;
    }

    public function analyse()
    {
        $absoluteFilePath = $this->getTargetPath();
        $fileNameWithExtension = $this->target->getRelativePathname();

        echo "Nome: ".$absoluteFilePath;
        echo "- Tipo: ".$fileNameWithExtension;
        echo "\n\n";

        \Finder\Models\Entytys\Digital\Midia\File::create([
            'location' => $absoluteFilePath
        ]);
        // dd($absoluteFilePath, $fileNameWithExtension, $this->target);
        // ...
    }
}