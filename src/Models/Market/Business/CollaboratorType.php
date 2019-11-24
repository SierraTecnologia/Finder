<?php
/**
 * 0 -> Founder
 * 1 -> Co-Founder
 * 2 -> Sócio
 * 3 -> Assalariado
 */
namespace Siravel\Models\Market\Business;

use Siravel\Models\Model;

class CollaboratorType extends Model
{

    protected $organizationPerspective = false;

    protected $table = 'business_collaborator_types';       

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'person_id',
        'business_id',
        'business_collaborator_type_id',
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
        'score' => [
            'type' => 'float',
            "analyzer" => "standard",
        ],
    );


    public function gateway()
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