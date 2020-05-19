<?php
/**
 * Informação Imutavel (Categorias, gostos, etc..)
 */
namespace Finder\Analysator\Information\RegisterTypes;

class RegisterInformationEntity extends AbstractRegisterType
{
    public static $name = 'Information';

    public static $examples = [
        'category', 'categoria', 'type', 'tipo',

        'gosto', 'skill',

        'role', 'grupo'
    ];



}
