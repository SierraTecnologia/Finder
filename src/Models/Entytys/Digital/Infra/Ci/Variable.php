<?php

namespace Finder\Models\Entytys\Digital\Infra\Ci;

use Finder\Models\Model;

class Variable extends Model
{

    protected $organizationPerspective = true;

    protected $table = 'infra_ci_variables';       

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_id',
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


}