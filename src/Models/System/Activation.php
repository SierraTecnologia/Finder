<?php

namespace Finder\Models\System;

use Finder\Modela\Model;

class Activation extends Model
{

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}