<?php

namespace Finder\Services;

class MenuService
{

    public static function getAdminMenu()
    {
        $finder = [];
        $finder[] = [
            'text'        => 'Finder Home',
            'route'       => 'finder.home',
            'icon'        => 'dashboard',
            'icon_color'  => 'blue',
            'label_color' => 'success',
            // 'access' => \App\Models\Role::$ADMIN
        ];
        $finder[] = [
            'text'        => 'Finder Index',
            'route'       => 'finder.finder',
            'icon'        => 'dashboard',
            'icon_color'  => 'blue',
            'label_color' => 'success',
            // 'access' => \App\Models\Role::$ADMIN
        ];
        $finder[] = [
            'text'        => 'Finder Pessoas',
            'route'       => 'finder.persons',
            'icon'        => 'dashboard',
            'icon_color'  => 'blue',
            'label_color' => 'success',
            // 'access' => \App\Models\Role::$ADMIN
        ];

        return $finder;
    }
}
