<?php
/**
 * Group/Team Member - @todo Fazer esse model aqui
 */

namespace Finder\Models\Code;

use Pedreiro\Models\Base; //use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Hash;
use Muleta\Traits\Models\EloquentGetTableNameTrait;
use Illuminate\Support\Str;

class GroupMember extends Base
{
    use EloquentGetTableNameTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_id',
        'user_id',
        'token',
        'company_token',
        'is_active'
    ];

    protected $mappingProperties = array(

        'customer_id' => [
          'type' => 'id',
          "analyzer" => "standard",
        ],

        'credit_card_id' => [
            'type' => 'id',
            "analyzer" => "standard",
        ],

        'token' => [
          'type' => 'string',
          "analyzer" => "standard",
        ],

        'company_token' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],

        'is_active' => [
          'type' => 'string',
          "analyzer" => "standard",
        ],
    );

    public static function boot()
    {
        parent::boot();

        self::creating(
            function ($model) {
                // @todo Transformar em um Evento
                if ($model->is_active=='') {
                    $model->is_active = 1;
                }
                $model->token = (string) Hash::make(\Illuminate\Support\Str::random(8));
            }
        );

    }
}