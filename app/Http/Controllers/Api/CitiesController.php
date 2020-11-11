<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CitiesResource;
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
}
