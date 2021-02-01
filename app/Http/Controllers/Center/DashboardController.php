<?php

namespace App\Http\Controllers\Center;

use App\Http\Controllers\Controller;
use App\Repositories\CityRepository;
use App\Repositories\DiveSiteRepository;
use App\Repositories\EquipmentRepository;
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
     * @var EquipmentRepository
     */
    private $equipmentRepository;

    /**
     * DashboardController constructor.
     * @
     * @param CityRepository $cityRepository
     * @param DiveSiteRepository $diveSiteRepository
     * @param EquipmentRepository $equipmentRepository
     */
    public function __construct(CityRepository $cityRepository, DiveSiteRepository $diveSiteRepository, EquipmentRepository $equipmentRepository)
    {
        $this->cityRepository = $cityRepository;
        $this->diveSiteRepository = $diveSiteRepository;
        $this->equipmentRepository = $equipmentRepository;
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
        $equipments = $this->equipmentRepository->findAll()->pluck('name', 'id');

        return view('center.dashboard', compact('breadcrumbs', 'cities', 'info', 'sites', 'equipments'));
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
