<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Repositories\CountryRepository;

class CountriesController extends AdminController
{
    protected $block = 'countries';
    protected $repository = CountryRepository::class;

    protected $indexBreadcrumbs = [['link' => "admin/dashboard", 'name' => "Dashboard"], ['link' => 'admin/countries', 'name' => "Countries"]];

    /**
     * @var string[]
     */
    protected $permission = ['index', 'create', 'edit', 'destroy'];

}
