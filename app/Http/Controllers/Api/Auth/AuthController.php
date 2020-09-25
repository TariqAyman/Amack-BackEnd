<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\UserLogin;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\User as UserResource;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /** @var UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login(UserLogin $request)
    {
        try {
            $user = $this->userRepository->findOneBy(['email' => $request->get('email')]);
            if (!Hash::check($request->get('password'), $user->password)) {
                return response()->json(['errors' => 'Wrong Credentials'], 401);
            }
        } catch (ModelNotFoundException $exception) {
            return response()->json(['errors' => 'Wrong Credentials'], 401);
        }

        return new UserResource(auth('api')->user());
    }

    public function logout(): JsonResponse
    {
        /** @var User $user */
        $user = auth('api')->user();
        if (null === $user->token()) {
            throw new \InvalidArgumentException('token not found');
        }
        $user->token()->revoke();
        return response()->json(['message' => 'User logged out successfully'], 200);
    }
}
