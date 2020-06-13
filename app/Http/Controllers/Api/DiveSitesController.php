<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SimpleDiveSite;
use App\Repositories\CityRepository;
use App\Repositories\DiveSiteRepository;
use App\Http\Resources\DiveSite as DiveSiteResource;
use App\Http\Resources\SimpleDiveSite as SimpleDiveSiteResource;
use App\Http\Resources\SimpleDiveCity as SimpleDiveCityResource;
use Illuminate\Http\JsonResponse;

class DiveSitesController extends Controller
{
    /** @var DiveSiteRepository */
    private $diveSiteRepository;

    /** @var CityRepository */
    private $cityRepository;


    public function __construct(DiveSiteRepository $diveSiteRepository, CityRepository $cityRepository)
    {
        $this->diveSiteRepository = $diveSiteRepository;
        $this->cityRepository = $cityRepository;
    }


    public function index()
    {
        $sites = $this->diveSiteRepository->search(request());
        return DiveSiteResource::collection($sites);
    }

    public function autoComplete()
    {
        $sites = $this->diveSiteRepository->findByPartName(request());
        $cities = $this->cityRepository->findByPartName(request());
        $sites = SimpleDiveSiteResource::collection($sites)->toArray(request());
        $cities = SimpleDiveCityResource::collection($cities)->toArray(request());
        $results = array_merge($sites, $cities);
        return new JsonResponse($results);
    }
}
