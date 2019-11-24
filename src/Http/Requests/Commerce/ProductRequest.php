<?php

namespace Finder\Http\Requests\Commerce;

use Finder\Models\Commerce\Product;

class ProductRequest extends CommerceRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return Product::$rules;
    }
}
