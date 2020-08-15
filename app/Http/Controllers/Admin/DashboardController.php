<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        view()->share('current', 'dashboard');
        return view('admin.dashboard');
    }
}
