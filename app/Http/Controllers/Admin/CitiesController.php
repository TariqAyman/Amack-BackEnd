<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Repositories\CityRepository;
use App\Repositories\CountryRepository;
use App\Repositories\DiveSiteRepository;
use App\Repositories\SeasonRepository;
use Illuminate\View\View;

class CitiesController extends AdminController
{
    protected $block = 'cities';
    protected $repository = CityRepository::class;

    /** @var CountryRepository */
    protected $countryRepository;
    /**
     * @var SeasonRepository
     */
    private $seasonRepository;
    /**
     * @var CityRepository
     */
    private $cityRepository;
    /**
     * @var DiveSiteRepository
     */
    private $diveSiteRepository;


    public function __construct(CountryRepository $countryRepository, SeasonRepository $seasonRepository, DiveSiteRepository $diveSiteRepository)
    {
        $this->countryRepository = $countryRepository;
        parent::__construct();
        $this->seasonRepository = $seasonRepository;
        $this->diveSiteRepository = $diveSiteRepository;
    }


    public function create(): View
    {
        $countries = $this->countryRepository->findAll(['id', 'name']);
        $seasons = $this->countryRepository->findAll(['id', 'name']);
        $top_sites = $this->diveSiteRepository->getModel()::pluck('name', 'id');
        return view('admin.' . $this->block . '.form', compact('countries', 'seasons', 'top_sites'));
    }

    public function edit(int $id): View
    {
        $countries = $this->countryRepository->findAll(['id', 'name']);
        $data = $this->repository->find($id);
        $seasons = $this->countryRepository->findAll(['id', 'name']);
        $top_sites = $this->diveSiteRepository->getModel()::where('id', '!=', $id)->pluck('name', 'id');
        return view('admin.' . $this->block . '.form', compact('data', 'countries', 'seasons', 'top_sites'));
    }
}
