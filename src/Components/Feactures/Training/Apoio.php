<?php

namespace Finder\Components\Feactures\Training;

class Apoio
{

    public function plataforms()
    {
        return [
            Integrations\Connectors\Coursera\Coursera::class,
            Integrations\Connectors\Youtube\Youtube::class,
        ];
    }

    public function create()
    {
        return [
            
        ];
    }

    
}