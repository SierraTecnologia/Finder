<?php
/**
 * Informacoes que estao sempre mudando (Temperatura por exemplo)
 */

namespace Finder\Analysator\Information\Group;


class GroupAuditEntity extends EloquentGroup
{
    public static $name = 'Audit';

    public static $examples = [
        'log', 'logger', 'registro', 'data'
    ];



}
