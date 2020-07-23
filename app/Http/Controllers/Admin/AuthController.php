<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AuthController extends Controller
{
    use AuthenticatesUsers;


    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function redirectPath()
    {
        return route('dashboard');
    }
}
