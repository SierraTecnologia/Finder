<?php

namespace Finder\Http\Controllers;

use Finder\Services\FinderService;
use Illuminate\Support\Facades\Schema;
use Population\Repositories\PersonRepository;

class FinderController extends Controller
{
    protected $service;

    public function __construct(FinderService $service)
    {
        parent::__construct();

        $this->service = $service;
    }

    public function index()
    {
        return view('finder::finder.home');
    }

    public function persons(PersonRepository $personRepo)
    {
        // $orders = $personRepo->getByCustomer(auth()->id())->orderBy('created_at', 'DESC')->paginate(\Illuminate\Support\Facades\Config::get('cms.pagination'));
        $persons = $personRepo->all(); //->paginate(\Illuminate\Support\Facades\Config::get('cms.pagination'));

        return view('finder::finder.persons')->with('persons', $persons);
    }
}
