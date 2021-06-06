<?php

namespace Finder\Http\Requests\Commerce;

use Population\Models\Commerce\Plan;

class PlanRequest extends CommerceRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return app(Plan::class)->rules;
    }
}
