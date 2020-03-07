<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api\Auth;


use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\UserRegister;
use App\Http\Requests\Api\Users\ChangePassword;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\User as UserResource;

class UsersController extends Controller
{

    public function register(UserRegister $request): UserResource
    {
        /** @var User $user */
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->city_id = $request->city_id;
        $user->country_id = $request->country_id;
        $user->password = Hash::make($request->password);
        $user->save();
        return new UserResource(User::find($user->id));
    }

    public function changePassword(ChangePassword $request): JsonResponse
    {
        /** @var User $user */
        $user = auth()->user();
        $user->password = Hash::make($request->newPassword);
        $user->save();

        if (null === $user->token()) {
            throw new \InvalidArgumentException('token not found');
        }
        $user->token()->revoke();
        return response()->json(['message' => 'Password has been updated please login with new password'], 200);
    }


}
