<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Repositories\DiveActivityRepository;

class DiveActivitiesController extends AdminController
{
    protected $block = 'dive-activities';

    protected $repository = DiveActivityRepository::class;
}
