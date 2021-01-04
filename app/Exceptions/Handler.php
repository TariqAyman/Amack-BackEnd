<?php

namespace App\Exceptions;

use App\Providers\RouteServiceProvider;
use Throwable;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        \League\OAuth2\Server\Exception\OAuthServerException::class
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param Throwable $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request
     * @param Throwable $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Exception
     */
    public function render($request, Throwable $exception)
    {
        return parent::render($request, $exception);
    }

    protected function unauthenticated($request, AuthenticationException $exception)
    {

        if ($request->expectsJson() || $request->route()->getPrefix() == 'api') {
            return response()->json(['message' => "You are Unauthorized."], 401);
        }

        $guard = $exception->guards()[0] ?? null;

        switch ($guard) {
            case 'admin':
                $login = 'admin.login';
                break;
            case 'staff':
                $login = 'center.login';
                break;
            default:
                $login = 'home';
                break;
        }

        return redirect()->guest(route($login));
    }
}
