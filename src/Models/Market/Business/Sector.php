<?php

namespace Finder\Models\Market\Business;

use Finder\Models\Model;

class Sector extends Model
{

    protected $organizationPerspective = false;

    protected $table = 'business_sectors';       

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'name',
        'slug'
    ];


    protected $mappingProperties = array(

        'user_id' => [
            'type' => 'integer',
            "analyzer" => "standard",
        ],
        'name' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],
        'slug' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],
    );

    public function user()
    {
        return $this->belongsTo('Finder\Models\User', 'user_id', 'id');
    }

}