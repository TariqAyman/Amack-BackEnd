<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\UserLogin;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\User as UserResource;

class AuthController extends Controller
{
    public function login(UserLogin $request)
    {

        if (!auth()->attempt(['mobile' => $request->get('mobile'), 'password' => $request->get('password')])) {
            return response()->json(['error' => 'UnAuthorised'], 401);
        }
        return new UserResource(auth()->user());

    }

    public function logout(): JsonResponse
    {
        /** @var User $user */
        $user = auth()->user();
        if (null === $user->token()) {
            throw new \InvalidArgumentException('token not found');
        }
        $user->token()->revoke();
        return response()->json(['message' => 'User logged out successfully'], 200);
    }
}
