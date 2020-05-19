<?php
/**
 *  Informacao que progride (DInheiro, skill, contatos, idade, etc)
 */

namespace Finder\Analysator\Information\HistoryType;


class HistoryProgressTypeEntity extends AbstractHistoryType
{
    public static $name = 'Progress';

    public static $examples = [
        'idade',
        'contato','contact',
        'skill', 'habilidade', 'caracteristica'
    ];




}
