<?php

namespace App\Http\Controllers\Center;

use App\Helpers\Enum\Currencies;
use App\Http\Controllers\Controller;
use App\Models\DiveActivity;
use App\Repositories\CenterRepository;
use App\Repositories\CityRepository;
use App\Repositories\EquipmentRepository;
use Illuminate\Http\Request;

class CenterController extends Controller
{
    /**
     * @var CityRepository
     */
    private $cityRepository;
    /**
     * @var DiveActivity
     */
    private $diveActivity;

    /**
     * @var CenterRepository
     */
    private $repository;
    /**
     * @var EquipmentRepository
     */
    private $equipmentRepository;

    /**
     * CenterController constructor.
     * @
     * @param CityRepository $cityRepository
     * @param DiveActivity $diveActivity
     * @param CenterRepository $repository
     * @param EquipmentRepository $equipmentRepository
     */
    public function __construct(CityRepository $cityRepository, DiveActivity $diveActivity, CenterRepository $repository, EquipmentRepository $equipmentRepository)
    {
        $this->cityRepository = $cityRepository;
        $this->diveActivity = $diveActivity;
        $this->repository = $repository;
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
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Profile"], ['name' => "Center Info"]
        ];

        $cities = $this->cityRepository->getAllWith(['sites']);

        $info = auth()->user()->center;
        $activities = $this->diveActivity->getModel()::pluck('name', 'id');
        $languages = ['ar' => 'Arabic', 'esp' => 'Spanish', 'en' => 'English', 'ru' => 'Russian', 'deu' => 'Deutsch', 'fra' => 'French', 'ita' => 'Italian'];
        $currencies = Currencies::list();
        $equipments = $this->equipmentRepository->getModel()::all();
        $equipment_groups = $equipments->groupBy('state');

        $miniIntegers = [
            ['key' => 'mini_days_shore_dives', 'text' => 'Minimum Days for SHORE DIVES'],
            ['key' => 'mini_days_boat_dives', 'text' => 'Minimum Days for BOAT DIVES'],
            ['key' => 'mini_days_em_dives', 'text' => 'Minimum Days for EM DIVES'],
            ['key' => 'mini_days_night_dives', 'text' => 'Minimum Days for NIGHT DIVES'],
        ];

        $maxIntegers = [
            ['key' => 'max_divers_per_trip', 'text' => 'MAX DIVERS / TRIP'],
            ['key' => 'max_divers_per_day', 'text' => 'MAX DIVERS / DAY'],
            ['key' => 'max_day_divers', 'text' => 'MAX DIVERS / DAY '],
            ['key' => 'max_night_dives', 'text' => 'MAX NIGHT DIVES'],
            ['key' => 'max_em_dives', 'text' => 'MAX EM DIVES'],
            ['key' => 'max_days_shore_dives', 'text' => 'Maximum Days for SHORE DIVES'],
            ['key' => 'max_days_boat_dives', 'text' => 'Maximum Days for BOAT DIVES'],
            ['key' => 'max_days_em_dives', 'text' => 'Maximum Days for EM DIVES'],
            ['key' => 'max_days_night_dives', 'text' => 'Maximum Days for NIGHT DIVES']
        ];

        return view('center.info.index', compact('breadcrumbs', 'cities', 'info', 'activities', 'languages', 'currencies', 'equipments', 'equipment_groups', 'miniIntegers', 'maxIntegers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->repository->update(auth()->user()->center_id, $request->except('_token'));
        return redirect()->route('center.info')->with('status', 'Updated Successfully!');
    }

    public function getCitiesAJAX(Request $request)
    {
        $cities = $this->cityRepository->whereIn('id', $request->get('ids'));
        $info = auth()->user()->center;
        return view('center.info.section.citiesWithSites', compact('info','cities'));
    }

    public function updateSites(Request $request)
    {
        $this->repository->updateSites(auth()->user()->center_id, $request->except('_token'));
        return redirect()->back()->with('status', 'Updated Successfully!');
    }
}
