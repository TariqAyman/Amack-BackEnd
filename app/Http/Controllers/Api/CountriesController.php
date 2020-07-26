<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\CountryRepository;
use Illuminate\Http\JsonResponse;

class CountriesController extends Controller
{
    /** @var CountryRepository $countryRepository */
    private $countryRepository;


    public function __construct(CountryRepository $countryRepository)
    {
        $this->countryRepository = $countryRepository;
    }

    public function listCountries(): JsonResponse
    {
        $countries = $this->countryRepository->findEnabled();
        return response()->json($countries, 200);
    }
}
