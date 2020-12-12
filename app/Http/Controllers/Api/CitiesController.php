<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CitiesResource;
use App\Http\Resources\CityResource;
use App\Repositories\CityRepository;
use Illuminate\Http\Request;

class CitiesController extends ApiController
{
    /** @var CityRepository */
    private $cityRepository;


    public function __construct(CityRepository $cityRepository)
    {
        $this->cityRepository = $cityRepository;
    }

    public function index()
    {
        $sites = $this->cityRepository->search(request());
        $sites = CitiesResource::collection($sites);
        return $this->success($sites);
    }

    public function show($id)
    {
        $city = $this->cityRepository->getWith($id, ['sites']);
        $city = CityResource::make($city);
        return $this->success($city);
    }
}
