<?php
/**
 * 
 */

namespace Finder\Actions;

use Log;

class Action
{

    protected $allActions = [];

    public $cod = false;

    public $classAfetada = false;

    public $classAExecutar = false;

    public $type = false;

    /**
     * Ações para Investigar ou Explorar algo
     * Spider, Aranha, ou Explorer, Explorador
     */
    public static $spider = 1;

    /**
     * Ações de Rotinas - Periodicos
     * Ex: Backup, Ping nos Servidores
     */
    public static $routine = 2;

    /**
     * Ações que são emitidas como eventos engatilhados após determinadas ações em cima de Repositórios
     */
    public static $hook = 3;

    /**
     * Ações de importar conteudos dos tokens, jira, repositórios, etc.. 
     * Ou enviar informações do Boss para Esses Produtos. Ex: Workflow do jira, ou novos tickets!
     */
    public static $sync = 4;

    /**
     * Verifica latencia e serviços se estão tudo em Order e Funcionando
     */
    public static $life = 5;

    public function __construct($cod, $classAfetada, $classAExecutar, $type)
    {
        $this->cod = $cod;
        $this->classAfetada = $classAfetada;
        $this->classAExecutar = $classAExecutar;
        $this->type = $type;
    }

    public function getClassWithParams($instance)
    {
        $classAExecutar = '\\'.$this->classAExecutar;
        if (!$instance instanceof $this->classAfetada) {
            Log::notice('Não é instancia de '. $this->classAfetada.'!');
            return abort(500, 'Não é instancia de!');
        }
        return new $classAExecutar($instance);
    }

    /**
     * FUncoes para os Controllers Internos
     */
    public static function getModels()
    {
        $actions = self::loadActions();
        $models = [];
        foreach ($actions as $action)
        {
            if (!in_array($action->classAfetada, $models)) {
                $models[] = $action->classAfetada;
            }
        }
        return $models;
    }

    

    /**
     * FUncoes para os Controllers Internos
     */
    public static function getOnlyActionsForModel($model)
    {
        $actions = self::loadActions();
        $onlyModelActions = [];
        foreach ($actions as $action)
        {
            if ($model == $action->classAfetada) {
                $onlyModelActions[] = $action;
            }
        }
        return $onlyModelActions;
    }


    /**
     * Funções GErais
     */
    protected static function loadActions()
    {
        return self::getSyncs(self::getHooks(self::getRoutines(self::getSpiders())));
    }

    public static function getActionByCode($cod)
    {
        $actions = self::loadActions();
        foreach($actions as $action) {
            if($action->cod == $cod) {
                return $action;
            }
        }
        return false;
    }
    
    protected static function getSpiders($actions = [])
    {
        /**
         * Scaneia paginas de determinado Website
         */
        $actions[] = self::insertAction(
            'scanDomain',
            \Population\Models\Entytys\Digital\Infra\Domain::class, // Ou Url
            \SiInteractions\Worker\Explorer\Spider::class,
            self::$spider
        );

        /**
         * Scaneia paginas de determinado Website
         */
        $actions[] = self::insertAction(
            'whoisDomain',
            \Population\Models\Entytys\Digital\Infra\Domain::class, // Ou Url
            \SiInteractions\Worker\Explorer\Whois::class,
            self::$spider
        );

        return $actions;
    }
    
    protected static function getRoutines($actions = [])
    {
        /**
         * Backup dos 
         */
        $actions[] = self::insertAction(
            'backupDatabase',
            \Population\Models\Entytys\Digital\Infra\DatabaseCollection::class,
            \SiInteractions\Worker\Sync\Keys\BackupCollection::class,
            self::$routine
        );

        /**
         * Procura por arquivos de Log dentro das Maquinas
         */
        $actions[] = self::insertAction(
            'searchLog',
            \Population\Models\Entytys\Digital\Infra\Computer::class,
            \SiInteractions\Worker\Logging\Logging::class,
            self::$routine
        );

        return $actions;
    }

    protected static function getHooks($actions = [])
    {

        /**
         * Analisa a qualidade de código nos Projects Atuais
         */
        $actions[] = self::insertAction(
            'analyseComit',
            \Population\Models\Entytys\Digital\Code\Commit::class,
            \SiInteractions\Worker\Analyser\Analyser::class,
            self::$hook
        );

        /**
         * Atualiza as Maquinas de Staging e Produção
         */
        $actions[] = self::insertAction(
            'deployCommit',
            \Population\Models\Entytys\Digital\Code\Commit::class,
            \SiInteractions\Worker\Deploy\Deploy::class,
            self::$hook
        );

        return $actions;
    }


    protected static function getSyncs($actions = [])
    {

        $actions[] = self::insertAction(
            'importIntegrationToken',
            \Population\Models\Components\Integrations\Token::class,
            \SiInteractions\Worker\Sync\Keys\ImportFromToken::class,
            self::$routine
        );

        /**
         * Analisa a qualidade de código nos Projects Atuais
         */
        $actions[] = self::insertAction(
            'syncProject',
            \Population\Models\Entytys\Digital\Code\Project::class,
            \SiInteractions\Worker\Sync\Project::class,
            self::$hook
        );

        return $actions;

    }

    protected static function insertAction($cod, $classAfetada, $classAExecutar, $type)
    {
        $newAction = new self($cod, $classAfetada, $classAExecutar, $type);
        return $newAction;
    }

    /**
     * Se byClass nao for false, retorna todas as ações para qualquer tipo de instancia
     */
    public function getActions($byClass = false)
    {
        if (empty($this->allActions)) {
            $this->allActions = self::loadActions();
        }
        return $this->allActions;
    }

}