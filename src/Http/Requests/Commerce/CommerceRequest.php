<?php

namespace Finder\Http\Requests\Commerce;

use Illuminate\Support\Facades\Gate;
use Finder\Http\Requests\Request;
use Population\Models\Feature;

abstract class CommerceRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; //@todo Fazer Gate::allows('has-feature', Feature::find('commerce'));
    }
}
