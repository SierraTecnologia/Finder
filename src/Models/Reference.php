<?php

namespace Finder\Models;

use Pedreiro\Models\Base;
use Fabrica\Models\Code\Issue;
use Fabrica\Models\Code\Field;
use Fabrica\Models\Code\Project;

class Reference extends Base
{

    protected $organizationPerspective = false;

    protected $table = 'references';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'name',
    ];


    /**
     * Get all of the issues that are assigned this reference.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function issues(): self
    {
        return $this->morphedByMany(Issue::class)->withPivot('identify');
    }


    /**
     * Get all of the fields that are assigned this reference.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function fields(): self
    {
        return $this->morphedByMany(Field::class)->withPivot('identify');
    }

    /**
     * Get all of the projects that are assigned this reference.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function projects(): self
    {
        return $this->morphedByMany(Project::class)->withPivot('identify');
    }
    
}