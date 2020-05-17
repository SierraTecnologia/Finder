<?php
/**
 * Informacoes que estao sempre mudando (Temperatura por exemplo)
 */

namespace Finder\Analysator\HistoryType;


class GroupFinanceEntity extends EloquentGroup
{
    public static $name = 'Finance';

    public static $examples = [
        'bank',
        'gasto',
        'renda'
    ];



}
