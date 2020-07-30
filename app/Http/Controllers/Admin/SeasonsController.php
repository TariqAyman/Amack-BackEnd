<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Repositories\SeasonRepository;

class SeasonsController extends AdminController
{
    protected $block = 'seasons';
    protected $repository = SeasonRepository::class;
}
