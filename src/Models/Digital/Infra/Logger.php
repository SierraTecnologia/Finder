<?php

namespace Finder\Models\Digital\Infra;

use Support\Models\Base;
use SiUtils\Tools\Ssh;

class Logger extends Base
{

    protected $organizationPerspective = true;

    protected $table = 'infra_loggers';       

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content',
        'type',
        'data',
        'customer_id',
        'user_id',
    ];


    protected $mappingProperties = array(

        'customer_id' => [
            'type' => 'integer',
            "analyzer" => "standard",
        ],
        'user_id' => [
            'type' => 'integer',
            "analyzer" => "standard",
        ],
    );

    public function user()
    {
        return $this->belongsTo(\Illuminate\Support\Facades\Config::get('sitec.core.models.user', \App\Models\User::class), 'user_id', 'id');
    }

    public function computer()
    {
        return $this->belongsTo('Finder\Models\Digital\Infra\Computer', 'computer_id', 'id');
    }
}