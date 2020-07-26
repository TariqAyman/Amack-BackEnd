<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;


use App\Repositories\DiveEntryRepository;

class DiveEntriesController extends AdminController
{
    protected $block = 'dive-entries';

    protected $repository = DiveEntryRepository::class;
}
