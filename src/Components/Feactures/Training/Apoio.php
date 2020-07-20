<?php

namespace Finder\Components\Feactures\Training;

class Apoio
{

    public function plataforms()
    {
        return [
            Integrations\Connectors\Connector\Coursera\Coursera::class,
            Integrations\Connectors\Connector\Youtube\Youtube::class,
        ];
    }

    public function create()
    {
        return [
            
        ];
    }

    
}