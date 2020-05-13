<?php
/**
 * Informacoes que estao sempre mudando (Temperatura por exemplo)
 */

namespace Finder\Analysator\HistoryType;


class GroupSocietyEntity extends EloquentGroup
{
    public $name = 'Society';

    public static $examples = [
        'gender',
        'genero',
        'business'
    ];



}
