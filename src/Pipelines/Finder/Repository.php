<?php

namespace Finder\Pipelines\Finder;

use Operador\Contracts\Stage as StageBase;

class Repository extends StageBase
{
    public function __invoke($payload)
    {
        $this->info('Analisando Repository: '.$payload->getTargetPath());
        
        return $payload;
    }
}