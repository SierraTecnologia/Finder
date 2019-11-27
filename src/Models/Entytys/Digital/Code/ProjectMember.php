<?php

namespace Finder\Models\Entytys\Digital\Code;

use Finder\Models\Model;

class ProjectMember extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cpf',
        'card_name',
        'brand_id',
        'card_number',
        'exp_year',
        'exp_month',
        'cvc',
        'is_active'
    ];

    protected $mappingProperties = array(

        /**
         * Informações do Dono
         */
        'cpf' => [
          'type' => 'string',
          "analyzer" => "standard",
        ],
        'card_name' => [
          'type' => 'string',
          "analyzer" => "standard",
        ],

        /**
         * Cartão de Crédito
         */
        'brand_id' => [
          'type' => 'id',
          "analyzer" => "standard",
        ],
        'card_number' => [
          'type' => 'string',
          "analyzer" => "standard",
        ],
        'exp_year' => [
          'type' => 'string',
          "analyzer" => "standard",
        ],
        'exp_month' => [
          'type' => 'string',
          "analyzer" => "standard",
        ],

        // CVV
        'cvc' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],

        // Se esta ativado para Compra ou Bloqueado
        'is_active' => [
          'type' => 'string',
          "analyzer" => "standard",
        ],
    );

    public function customer()
    {
        return $this->belongsTo('Finder\Models\Customer', 'customer_id', 'id');
    }

    public function analysis()
    {
        return $this->hasMany('Finder\Models\Analysi');
    }

    public function orders()
    {
        return $this->hasMany('Finder\Models\Order');
    }

    /**
     * Get the tokens record associated with the user.
     */
    public function creditCardTokens()
    {
        return $this->hasMany('Finder\Models\CreditCardToken', 'credit_card_id', 'id');
    }

    /**
     * Recupera os tokens de gateways desse usuário
     */
    public function gatewayCustomers()
    {
        return $this->hasMany('Finder\Models\GatewayCustomer', 'customer_id', 'id');
    }
}