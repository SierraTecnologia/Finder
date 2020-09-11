<?php

namespace Finder\Http\Controllers\Master;

use Finder\Models\Digital\Internet\ComputerFile;
use Pedreiro\CrudController;

class ComputerFileController extends Controller
{
    use CrudController;

    public function __construct(ComputerFile $model)
    {
        $this->model = $model;
        parent::__construct();
    }
}
