<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Repositories\CountryRepository;

class CountriesController extends AdminController
{
    protected $block = 'countries';
    protected $repository = CountryRepository::class;
}
