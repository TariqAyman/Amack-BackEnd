<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Repositories\TaxonRepository;

class TaxonsController extends AdminController
{
    protected $block = 'taxons';
    protected $repository = TaxonRepository::class;
}
