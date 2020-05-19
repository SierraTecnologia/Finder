<?php
/**
 * 
 */

namespace Finder\Analysator\Information\HistoryType;

use Support\Contracts\Categorizador\AbstractCategorizador;

abstract class AbstractHistoryType extends AbstractCategorizador
{
    /**
     * Identify
     */
    public static $typesByOrder = [
        HistoryDinamicTypeEntity::class,
        HistoryImutavelTypeEntity::class,
        HistoryProgressTypeEntity::class,
    ];

}
