<?php

namespace Finder\Facades;

use Illuminate\Support\Facades\Facade;

class Finder extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'finder';
    }
}
