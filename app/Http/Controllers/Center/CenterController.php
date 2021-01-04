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
    public function __construct(CityRepository $cityRepository, DiveActivity $diveActivity, CenterRepository $repository,EquipmentRepository $equipmentRepository)
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
        $equipments = $this->equipmentRepository->getModel()::all()->groupBy('state');

        return view('center.info.index', compact('breadcrumbs', 'cities', 'info', 'activities', 'languages','currencies','equipments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->repository->update(auth()->user()->center_id, $request->all());
        return redirect()->route('center.info')->with('status', 'Updated Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
