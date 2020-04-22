<?php

namespace Finder\Models\Digital\Code;

use Support\Models\Base;
use Finder\Models\Reference;
use Finder\Models\Digital\Code\Project;
use StdClass;

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
        return $this->belongsTo(Project::class, 'code_project_id', 'id');
    }

    public function setField($fields)
    {
        // @todo fazer aqui 
        foreach ($fields as $fieldIdentify=>$result) {

            if (is_a($result, StdClass::class)) {

            }
            var_dump('IssueModel');
            var_dump($fieldIdentify);
            var_dump($result);
        }

    }
}