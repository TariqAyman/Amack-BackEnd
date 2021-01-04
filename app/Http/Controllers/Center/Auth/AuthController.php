<?php
/**
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 1/5/20, 1:52 AM
 * Last Modified: 12/28/19, 12:11 PM
 * Project Name: mdrastk.com
 * File Name: AuthController.php
 */

/**
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 12/27/19, 5:17 PM
 * Last Modified: 12/27/19, 5:04 PM
 * Project Name: Amack-backend
 * File Name: AuthController.php
 */
declare(strict_types=1);


namespace App\Http\Controllers\Center\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

final class AuthController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Create a new authentication controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest:staff', ['except' => ['getLogout']]);
        $this->middleware('auth:staff', ['only' => ['getLogout']]);
    }

    /**
     * Show the application login form.
     *
     * @return \Illuminate\Contracts\Foundation\Application|Factory|\Illuminate\Contracts\View\View|RedirectResponse
     */
    public function showLoginForm()
    {
        $pageConfigs = ['blankPage' => true];

        if (\Auth::guard('staff')->check()) {
            return redirect()->route('centers.dashboard');
        }

        return view('center.auth.login', compact('pageConfigs'));
    }

    public function redirectPath()
    {
        return route('dashboard');
    }

    /**
     * Handle a login request to the application.
     *
     * @param Request $request
     * @return RedirectResponse|Response
     * @throws ValidationException
     */
    public function login(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        // Attempt to log the user in
        if (\Auth::guard('staff')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // if successful, then redirect to their intended location
            return redirect()->intended(route('center.dashboard'));
        }
        // if unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors(trans('auth.failed'));
    }

    /**
     * Log the user out of the application.
     *
     * @return RedirectResponse
     */
    public function getLogout()
    {
        \Auth::logout();
        \Auth::guard('staff')->logout();
        return redirect()->route('center.login');
    }

    /**
     * Log the user out of the application.
     *
     * @return RedirectResponse
     */
    public function logout()
    {
        \Auth::guard('staff')->logout();
        return redirect()->route('center.login');
    }
}
