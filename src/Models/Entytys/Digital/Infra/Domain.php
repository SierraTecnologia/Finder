<?php

namespace Finder\Models\Entytys\Digital\Infra;

use Finder\Models\Model;
use Finder\Models\Entytys\Digital\Internet\Url;

class Domain extends Model
{

    public static $apresentationName = 'Dominios';

    protected $organizationPerspective = true;

    protected $table = 'infra_domains';       

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'url',
        'status',
        'user_id',
    ];


    protected $mappingProperties = array(

        'url' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],
        'status' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],
        'user_id' => [
            'type' => 'integer',
            "analyzer" => "standard",
        ],
    );

    public function getApresentationName()
    {
        return $this->url;
    }

    public function getRootPage()
    {
        if (!$url = $this->urls()->first()){
            $url = Url::create([
                'infra_domain_id' => $this->id,
                'url' => $this->url.'/',
            ]);
        }
        return $url;
    }


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

    public function urls()
    {
        return $this->hasMany('Finder\Models\Entytys\Digital\Internet\Url', 'infra_domain_id', 'id');
    }
}