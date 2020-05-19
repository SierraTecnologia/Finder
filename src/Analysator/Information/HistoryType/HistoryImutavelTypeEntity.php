<?php
/**
 * Informações Fixas que nunca mudam (data de Aniversario, nome, etc)
 */

namespace Finder\Analysator\Information\HistoryType;


class HistoryImutavelTypeEntity extends AbstractHistoryType
{
    public static $name = 'Imutavel';

    public static $examples = [
        'name',
        'aniversario','nascimento','birthday',
        'email',
        'telefone','phone',
        // 'name',
    ];



}
