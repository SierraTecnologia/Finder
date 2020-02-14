<?php

namespace Finder\Http\Controllers;

use Finder\Services\FinderService;
use Illuminate\Support\Facades\Schema;
use Finder\Models\Digital\Midia\Media;

class HomeController extends Controller
{
    protected $service;

    public function __construct(FinderService $service)
    {
        parent::__construct();

        $this->service = $service;
    }

    public function index()
    {

        $results = Media::all();

        // dd($results);
        return view(
            'finder::dash.home',
            compact('results')
        );
    }
}
