<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Repositories\CityRepository;
use App\Repositories\CountryRepository;
use Illuminate\View\View;

class CitiesController extends AdminController
{
    protected $block = 'cities';
    protected $repository = CityRepository::class;

    /** @var CountryRepository */
    protected $countryRepository;


    public function __construct(CountryRepository $countryRepository)
    {
        $this->countryRepository = $countryRepository;
        parent::__construct();
    }


    public function create(): View
    {
        $countries = $this->countryRepository->findAll(['id', 'name']);
        return view('admin.' . $this->block . '.form', compact('countries'));
    }

    public function edit(int $id): View
    {
        $countries = $this->countryRepository->findAll(['id', 'name']);

        $data = $this->repository->find($id);
        return view('admin.' . $this->block . '.form', compact('data', 'countries'));
    }
}
