<?php
namespace Finder\Spider\Finder;

use Finder\Logic\Output\AbstractOutput;
use Finder\Logic\Output\Filter\OutputFilterInterface;
use Finder\Logic\Output\TriggerableInterface;

use Symfony\Component\Finder\Finder;
use Finder\Spider\Abstracts\Spider;

/**
 * Run all script analysers and outputs their result.
 */
class Photos extends Spider
{

    public function analyse()
    {

        $finder = new Finder();
        
        // Selecionando Diretorio
        $finder->in($this->getTargetPath());


        $finder->files()->name(
            ['*.jpg', '*.png']
        );

        // $finder->files()->contains('sierra');

        echo 'Fotos encontradas: '.$finder->count()."\n\n";


        foreach ($finder as $file)
        {


    
            echo "Endereço Completo: ".$file->getRealPath()."\n";
            echo "Nome: ".$file->getRelativePathname();
            echo "\n\n";

            dd('oi');



            
        }
        // dd($finder);
    }


}