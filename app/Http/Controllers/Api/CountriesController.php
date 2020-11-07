<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\CountryRepository;
use Illuminate\Http\JsonResponse;

class CountriesController extends ApiController
{
    /** @var CountryRepository $countryRepository */
    private $countryRepository;


    public function __construct(CountryRepository $countryRepository)
    {
        $this->countryRepository = $countryRepository;
    }

    /**
     * @return string
     */
    public function listCountries(): string
    {
        $countries = $this->countryRepository->findEnabled();
        return $this->success($countries);
    }
}
