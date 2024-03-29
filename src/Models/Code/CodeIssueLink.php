<?php

namespace Finder\Models\Code;

use Pedreiro\Models\Base;

class CodeIssueLink extends Base
{
    protected $organizationPerspective = false;

    protected $table = 'code_issue_links';      

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'code_language_id',
        'status',
    ];
}