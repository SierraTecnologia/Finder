<?php
/**
 * Estatisticas Rodadas Diariamente
 */

namespace Finder\Routines\Database;

use Finder\Actions\Action;
use Finder\Actions\ActionCollection;
use Finder\Actions\Worker\Sync\Database\BackupCollection;

use Finder\Models\Digital\Infra\Database;
use Finder\Models\Digital\Infra\Computer;

class ExploreComputer extends ActionCollection
{

    /**
     * Avisa se precisa de Alvos Externos ou nao e descreve eles
     */
    public $externalTargetCounts = 1;
    
    /**
     * Avisa se precisa de Alvos Externos ou nao e descreve eles
     */
    public $externalTargetZeroClass = Computer::class;
    
    /**
     * Avisa se precisa de Alvos Externos ou nao e descreve eles
     */
    public $externalTargetZeroInstance = false;

    public function prepare()
    {
        if ($this->isPrepared) {
            return true;
        }

        $this->prepareAction();

        return parent::prepare();
    }

    public function execute()
    {
        if (!$this->hasTargets()) {
            return false;
        }

        // @todo
        $computers = Computer::all();
        foreach ($computers as $computer) {
            $ssh = $computer->connect();
        }

        return parent::execute();
    }

    public function prepareTargets(Computer $database)
    {
        $externalTargetZeroClass = $database;
    }

    public function hasTargets()
    {
        if ($this->externalTargetZeroInstance === false) {
            return false;
        }
        return true;
    }
    
    public function prepareAction()
    {
        $stage = 0;
        $action = Action::getActionByCode('');
        $this->newAction($action, $stage, 0);
    }

}
