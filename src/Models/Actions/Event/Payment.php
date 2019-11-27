<?php
/**
 * Armazena os tipos de pagamentos que fazem com cada moeda e suas taxas
 */

namespace Finder\Models\Actions\Event;

use Illuminate\Support\Facades\Hash;

use Finder\Models\Model;
class Payment  extends Model
{


    public function createByType()
    {
        return $this->belongsTo('Finder\Models\Customer', 'customer_id', 'id');
    }
}