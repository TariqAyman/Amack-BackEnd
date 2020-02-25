<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\UserLogin;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    public function login(UserLogin $request): JsonResponse
    {

        if (!auth()->attempt(['mobile' => $request->get('mobile'), 'password' => $request->get('password')])) {
            return response()->json(['error' => 'UnAuthorised'], 401);
        }

        $token = auth()->user()->createToken('user')->accessToken;
        return response()->json(['user' => auth()->user(), 'token' => $token], 200);


    }
}
