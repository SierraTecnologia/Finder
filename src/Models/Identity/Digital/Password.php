<?php

namespace Siravel\Models\Identity\Digital;

use Siravel\Models\Model;

class Password extends Model
{

    protected $organizationPerspective = false;

    protected $table = 'identity_passwords';     

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'password',
        'url',
    ];

    protected $mappingProperties = array(
        /**
         * User Info
         */
        'email' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],
        'password' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],
        'url' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],
    );
    
    /**
     * Get all of the slaves that are assigned this tag.
     */
    public function slaves()
    {
        return $this->morphedByMany('Siravel\Models\Identity\Slave', 'skillable');
    }

    /**
     * Get all of the users that are assigned this tag.
     */
    public function users()
    {
        return $this->morphedByMany('Finder\Models\User', 'skillable');
    }
}
