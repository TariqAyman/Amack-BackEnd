<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Repositories\CountryRepositoryInterface;
use Illuminate\Http\JsonResponse;

class CountriesController extends Controller
{
    /** @var CountryRepositoryInterface $countryRepository */
    private $countryRepository;


    public function __construct(CountryRepositoryInterface $countryRepository)
    {
        $this->countryRepository = $countryRepository;
    }

    public function listCountries(): JsonResponse
    {
        $countries = $this->countryRepository->findAll();
        return response()->json($countries, 200);
    }


}
