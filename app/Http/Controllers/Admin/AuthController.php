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
        $pageConfigs = ['blankPage' => true];

        return view('admin.auth.login',compact('pageConfigs'));
    }

    public function redirectPath()
    {
        return route('dashboard');
    }
}
