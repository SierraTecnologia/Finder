<?php
/**
 * 
 */

namespace Finder\Analysator\RegisterTypes;

use Support\Contracts\Categorizador\AbstractCategorizador;

abstract class AbstractRegisterType extends AbstractCategorizador
{
    /**
     * Identify
     */
    public static $typesByOrder = [
        RegisterEventEntity::class,
        RegisterHistoricEntity::class,
        RegisterTestimonialEntity::class,
        RegisterInformationEntity::class,
        RegisterOrganismEntity::class,
    ];

}
