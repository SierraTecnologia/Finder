<?php

namespace Finder\Http\Controllers\Master;

use Finder\Models\Digital\Internet\Url;
use Pedreiro\CrudController;

class UrlController extends Controller
{
    use CrudController;

    public function __construct(Url $model)
    {
        $this->model = $model;
        parent::__construct();
    }
}
