<?php

namespace Finder\Http\Controllers;

use Finder\Services\FinderService;
use Illuminate\Support\Facades\Schema;

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
        return view('finder::dash.home');
    }
}
