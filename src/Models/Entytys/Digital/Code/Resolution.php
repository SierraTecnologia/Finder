<?php

namespace Finder\Models\Entytys\Digital\Code;

use Finder\Models\Model;

class Resolution extends Model
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