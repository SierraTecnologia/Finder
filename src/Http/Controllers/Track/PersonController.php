<?php

namespace Finder\Http\Controllers\Track;

use Finder\Services\FinderService;
use Illuminate\Support\Facades\Schema;
use Telefonica\Repositories\PersonRepository;

class PersonController extends Controller
{
    protected $service;

    public function __construct(FinderService $service)
    {
        parent::__construct();

        $this->service = $service;
    }

    public function index(Request $request)
    {
        return view('finder::finder.person.home');
    }
}
