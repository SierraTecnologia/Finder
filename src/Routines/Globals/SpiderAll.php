<?php
/**
 * Estatisticas Rodadas Diariamente
 */

namespace Finder\Routines\Globals;

use Finder\Routines\Database\SpiderRoutine;

use Finder\Actions\Action;
use Finder\Actions\ActionCollection;
use Finder\Components\Worker\Sync\Database\SpiderCollection;

use Population\Models\Entytys\Digital\Infra\Domain;

class SpiderAll extends ActionCollection
{

    /**
     * Avisa se precisa de Alvos Externos ou nao e descreve eles
     */
    public $externalTargetCounts = 0;
    
    public function prepare()
    {
        // Spider de Todos os Bancos de Dados
        $domains = Domain::all();
        $this->othersTargets = count($domains);
        foreach ($domains as $domain) {
            $spiderRoutine = new SpiderRoutine();
            $spiderRoutine->prepareTargets($domain);
            $this->newAction($spiderRoutine);
        }
        return parent::prepare();
    }

}
