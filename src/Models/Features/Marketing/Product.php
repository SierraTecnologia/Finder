<?php

namespace Finder\Models\Features\Marketing;

use Finder\Models\Model;
use SiObjects\Support\Traits\Models\ComplexRelationamentTrait;
use SiObjects\Support\Traits\Models\BusinessTrait;

class Product extends Model
{
    use ComplexRelationamentTrait;
    
    protected static $COMPLEX_RELATIONAMENT_MODELS = [
        \Finder\Models\Entytys\Digital\Midia\Photo::class,
        \Finder\Models\Entytys\Digital\Midia\Video::class
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'time', // im segundos
        'money_code',
        'money_value',
        'model',
        'model_id'
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
    /**
     * Get all of the girls that are assigned this tag.
     */
    public function girls()
    {
        return $this->morphedByMany('Finder\Models\Identity\Girl', 'skillable');
    }

    /**
     * Get all of the users that are assigned this tag.
     */
    public function users()
    {
        return $this->morphedByMany('Finder\Models\User', 'skillable');
    }
}
