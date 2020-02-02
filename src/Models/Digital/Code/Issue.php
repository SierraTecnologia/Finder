<?php

namespace Finder\Models\Digital\Code;

use Support\Models\Base;

class Issue extends Base
{

    protected $organizationPerspective = true;

    protected $table = 'code_issues';

    protected $action = false;

    protected $target = false;

    protected $worker = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'key_name',
        'slug',
        'url',
    ];


    public function project()
    {
        return $this->belongsTo('Finder\Models\Digital\Code\Project', 'code_project_id', 'id');
    }

    
}