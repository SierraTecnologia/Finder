<?php
/**
 * Trata os Agrupamentos de Modelos
 */

namespace Finder\Analysator\Informate\Group;

abstract class EloquentGroup
{
    /**
     * Identify
     */
    protected $typesByOrder = [
        GroupFinanceEntity::class,
        GroupSocietyEntity::class,
    ];


    /**
     * Construct
     */
    public function __construct()
    {
        

    }

    // /**
    //  * Agrupando
    //  */ 
    // public function groupByNamespace()
    // {
    //     $namespaces = [];
    //     $namespaces = [
    //         'name' => 'Calendar',
    //         'localeNamespace' => 'App\Models',
    //         'tables' => []
    //     ];

    //     return $namespaces;
    // }



}
