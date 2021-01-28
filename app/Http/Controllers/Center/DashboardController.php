<?php

namespace App\Http\Controllers\Center;

use App\Http\Controllers\Controller;
use App\Repositories\CityRepository;
use App\Repositories\DiveSiteRepository;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * @var CityRepository
     */
    private $cityRepository;
    /**
     * @var DiveSiteRepository
     */
    private $diveSiteRepository;

    /**
     * DashboardController constructor.
     * @
     * @param CityRepository $cityRepository
     * @param DiveSiteRepository $diveSiteRepository
     */
    public function __construct(CityRepository $cityRepository, DiveSiteRepository $diveSiteRepository)
    {
        $this->cityRepository = $cityRepository;
        $this->diveSiteRepository = $diveSiteRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['name' => "Center Info"]
        ];
        $cities = $this->cityRepository->getAllWith(['sites']);
        $info = auth()->user()->center;
        $sites = $this->diveSiteRepository->mySites()->pluck('name', 'id');

        return view('center.dashboard', compact('breadcrumbs', 'cities', 'info', 'sites'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
}
