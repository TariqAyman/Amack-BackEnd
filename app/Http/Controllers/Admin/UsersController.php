<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Repositories\UserRepository;

class UsersController extends AdminController
{
    protected $repository = UserRepository::class;
    protected $block = 'users';

    protected $indexBreadcrumbs = [['link' => "admin/dashboard", 'name' => "Dashboard"], ['link' => 'admin/users', 'name' => "Users"]];

    /**
     * @var string[]
     */
    protected $permission = ['index', 'create', 'edit', 'destroy'];

}
