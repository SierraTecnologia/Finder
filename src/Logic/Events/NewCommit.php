<?php
/**
 * Rotinas de Inclusão de Dados
 */

namespace Finder\Logic\Events;

use Finder\Models\Digital\Code\Commit;
use Finder\Models\Digital\Infra\Pipeline;

class NewCommit
{
    public function __construct(Commit $commit)
    {

        // $pipeline = Pipeline::create([

        // ]);

        // Analisa o Commit

        $analyser = $commit;
    }
}
