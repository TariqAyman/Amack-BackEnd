<?php
/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 11/7/20, 9:29 PM
 * Last Modified: 11/7/20, 9:29 PM
 * Project Name: Amack-BackEnd
 * File Name: IdentifierMiddleware.php
 */
declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

final class IdentifierMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $request->request->add(['user_id' => auth('api')->user()->id]);

        return $next($request);
    }
}
