<?php
/**
 * Informação Imutavel (Categorias, gostos, etc..)
 */

namespace Finder\Analysator\RegisterTypes;


class RegisterInformationEntity extends AbstractRegisterType
{
    public static $name = 'Information';

    public static $examples = [
        'category', 'categoria', 'type', 'tipo',

        'gosto', 'skill',

        'role', 'grupo'
    ];



}
