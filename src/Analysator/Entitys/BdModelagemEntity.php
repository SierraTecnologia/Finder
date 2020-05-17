<?php
/**
 * Identifica as Tabelas e as Relaciona
 * 
 * nao usado pra porra nenhuma ainda
 */

namespace Finder\Analysator\Entitys;

use Finder\Analysator\Informate\Group\EloquentGroup;
use Finder\Analysator\HistoryType\AbstractHistoryType;
use Finder\Analysator\RegisterTypes\AbstractRegisterType;

class BdModelagemEntity
{
    protected $groupType = false;
    protected $historyType = false;
    protected $registerType = false;

    public function __construct()
    {

    }

    public function render($name)
    {
        $this->groupType = EloquentGroup::discoverType($name);
        $this->historyType = AbstractHistoryType::discoverType($name);
        $this->registerType = AbstractRegisterType::discoverType($name);
    }
}
