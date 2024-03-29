<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\SocialAuth;
use App\Http\Requests\Api\Auth\SocialLogin;
use App\Models\SocialUser;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Resources\User as UserResource;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class SocialLoginController extends Controller
{
    public function redirectToProvider(SocialLogin $request)
    {
        return Socialite::driver($request->query('provider'))->stateless()->redirect();
    }

    public function handleProviderCallback(SocialLogin $request): JsonResponse
    {
        $provider = $request->query('provider');
        $providerUser = Socialite::driver($provider)->stateless()->user();

        $socialAccount = SocialUser::query()->where('provider', '=', $provider)
            ->where('provider_user_id', '=', $providerUser->getId())
            ->first();

        if (!$socialAccount) {
            $socialAccount = new SocialUser([
                'provider_user_id' => $providerUser->getId(),
                'provider' => $provider
            ]);
            $user = User::query()->where('email', '=', $providerUser->getEmail())->first();

            if (!$user) {
                $user = User::query()->create([
                    'email' => $providerUser->getEmail(),
                    'name' => $providerUser->getName(),
                    'password' => md5(Str::random(10)),
                ]);
            }

            $socialAccount->user()->associate($user);
        }
        $socialAccount->token = $request->query('code');
        $socialAccount->save();
        return response()->json();
    }

    /** Auth with Social Token **/
    public function auth(SocialAuth $request): UserResource
    {
        $socialAccount = SocialUser::query()->where('token', '=', $request->post('token'))
            ->where('provider', '=', $request->post('provider'))
            ->first();

        if (!$socialAccount) {
            throw new UnauthorizedHttpException('token');
        }

        /** @var User $user */
        $user = $socialAccount->user;

        return new UserResource(User::query()->find($user->id));
    }
}
