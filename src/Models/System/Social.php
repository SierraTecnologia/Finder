<?php
namespace Finder\Models\System;

use Finder\Models\Model;

class Social extends Model {

    protected $table = 'social_logins';

    public function user()
    {
        return $this->belongsTo('Finder\Models\User');
    }
}