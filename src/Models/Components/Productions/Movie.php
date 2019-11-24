<?php

namespace Siravel\Models\Components\Productions;

use Siravel\Models\Model;

class Movie extends Production
{

    protected $table = 'production_movies';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'cpf',
        'email',
        'role_id'
    ];

    protected $mappingProperties = array(
        /**
         * User Info
         */
        'name' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],
        'cpf' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],
        'email' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],

        /**
         * Grupo de Usuário:
         * 
         * 3 -> Usuário de Produtora
         * Default: 3
         */
        'role_id' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],
    );

    public function getMovie()
    {
        return Scene::orderBy('order', 'DESC')->all();
    }

    public function analysis()
    {
        return $this->hasMany('Finder\Models\Analysi', 'analysi_id', 'id');
    }

    /**
     * Get the tokens record associated with the user.
     */
    public function customerTokens()
    {
        return $this->hasMany('Finder\Models\CustomerToken', 'customer_id', 'id');
    }

    /**
     * Recupera os tokens de gateways desse usuário
     */
    public function gatewayCustomers()
    {
        return $this->hasMany('Finder\Models\GatewayCustomer', 'customer_id', 'id');
    }
}
