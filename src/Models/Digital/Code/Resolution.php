<?php

namespace Finder\Models\Digital\Code;

use Support\Models\Base;

class Resolution extends Base
{

    protected $organizationPerspective = false;

    protected $table = 'code_resolutions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];
    
}