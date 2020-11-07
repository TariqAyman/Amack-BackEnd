<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Api\ApiController;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\User as UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends ApiController
{
    /** @var UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param Request $request
     * @return string
     */
    public function login(Request $request)
    {
        $this->validator($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        try {
            $user = $this->userRepository->findOneBy(['email' => $request->get('email')]);

            if (!Hash::check($request->get('password'), $user->password)) {
                return $this->errorResponse('Your password or email not correct');
            }

        } catch (ModelNotFoundException $exception) {
            return $this->errorResponse('Your password or email not correct');
        }

        return $this->success(new UserResource($user));
    }

    public function logout(): JsonResponse
    {
        /** @var User $user */
        $user = auth('api')->user();
        if (null === $user->token()) {
            throw new \InvalidArgumentException('token not found');
        }
        $user->token()->revoke();
        return $this->successResponse(['message' => 'User logged out successfully'], 200);
    }
}
