<?php

namespace Siravel\Models\Entytys\Digital\Infra;

use Siravel\Models\Model;

class Pipeline extends Model
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


    public function getDockerComposer()
    {
        return $this->belongsTo('Finder\Models\Gateway', 'gateway_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('Finder\Models\User', 'user_id', 'id');
    }

    public function customer()
    {
        return $this->belongsTo('Finder\Models\Customer', 'customer_id', 'id');
    }
}