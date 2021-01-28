<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\CenterResource;
use App\Http\Resources\CentersResource;
use App\Repositories\CenterRepository;
use App\Repositories\DiveSiteRepository;
use Illuminate\Http\Request;

class CenterController extends ApiController
{

    /**
     * @var CenterRepository
     */
    private $centerRepository;

    /**
     * @var DiveSiteRepository
     */
    private $diveSiteRepository;

    /**
     * CenterController constructor.
     * @param CenterRepository $centerRepository
     * @param DiveSiteRepository $diveSiteRepository
     */
    public function __construct(CenterRepository $centerRepository, DiveSiteRepository $diveSiteRepository)
    {
        $this->centerRepository = $centerRepository;
        $this->diveSiteRepository = $diveSiteRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return string
     */
    public function find(Request $request)
    {
        $this->validator($request, ['sites' => 'required|array']);

        $centers = $this->centerRepository->getModel()::whereHas('diveSites', function ($builder) use ($request) {
            foreach ($request->get('sites') as $site) {
                $builder->where('dive_sites.id', $site);
            }
        })->get();

        foreach ($centers as $index => $center) {
            $centers[$index]->sites = $this->diveSiteRepository->getModel()::whereIn('id', $request->get('sites'))->get();
        }

        $centers = CentersResource::collection($centers);

        return $this->success($centers);
    }

    public function show($id, Request $request)
    {
        $this->validator($request, ['sites' => 'required|array']);

        $center = $this->centerRepository->getModel()::find($id);

        $center['sites'] = $this->diveSiteRepository->getModel()::whereIn('id', $request->get('sites'))->get();

        $centers = new CenterResource($center);

        return $this->success($centers);
    }
}
