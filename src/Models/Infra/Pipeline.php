<?php

namespace Finder\Models\Infra;

use Pedreiro\Models\Base;

class Pipeline extends Base
{

    protected $organizationPerspective = true;

    protected $table = 'infra_pipelines';       

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'model',
        'model_id',
        'credit_card_id',
        'user_id',
    ];


    protected $mappingProperties = array(

        'customer_id' => [
            'type' => 'integer',
            "analyzer" => "standard",
        ],
        'credit_card_id' => [
            'type' => 'integer',
            "analyzer" => "standard",
        ],
        'user_id' => [
            'type' => 'integer',
            "analyzer" => "standard",
        ],
        'docker_compose_file' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],
    );


    public function user()
    {
        return $this->belongsTo(\Illuminate\Support\Facades\Config::get('sitec.core.models.user', \App\Models\User::class), 'user_id', 'id');
    }

}