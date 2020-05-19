<?php
/**
 * Trata os Agrupamentos de Modelos
 */

namespace Finder\Analysator\Information\Group;

use Support\Contracts\Categorizador\AbstractCategorizador;

abstract class EloquentGroup extends AbstractCategorizador
{
    /**
     * Identify
     */
    public static $typesByOrder = [
        GroupFinanceEntity::class,
        GroupSocietyEntity::class,
        GroupAuditEntity::class,
    ];


}
