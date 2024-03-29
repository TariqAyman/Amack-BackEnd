<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Repositories\AdminRepository;

class AdminsController extends AdminController
{
    protected $block = 'admins';

    protected $repository = AdminRepository::class;
}
