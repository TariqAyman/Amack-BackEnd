<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Repositories\DayTimeRepository;

class DayTimesController extends AdminController
{
    protected $block = 'day-times';
    protected $repository = DayTimeRepository::class;
}
