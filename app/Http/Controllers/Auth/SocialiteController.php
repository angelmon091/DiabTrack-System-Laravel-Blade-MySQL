<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    /**
     * Redirect the user to the provider authentication page.
     *
     * @param string $provider
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function redirectToProvider($provider)
    {
        if (!in_array($provider, ['google', 'facebook'])) {
            abort(404);
        }

        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from the provider.
     *
     * @param string $provider
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleProviderCallback($provider)
    {
        if (!in_array($provider, ['google', 'facebook'])) {
            abort(404);
        }

        try {
            $socialUser = Socialite::driver($provider)->user();
        } catch (Exception $e) {
            return redirect()->route('login')->with('error', 'Hubo un problema al autenticar con ' . ucfirst($provider));
        }

        $user = User::where($provider . '_id', $socialUser->getId())
            ->orWhere('email', $socialUser->getEmail())
            ->first();

        if ($user) {
            // Update social ID if not set
            if (!$user->{$provider . '_id'}) {
                $user->update([
                    $provider . '_id' => $socialUser->getId(),
                    'avatar' => $socialUser->getAvatar(),
                ]);
            }
            Auth::login($user);
        } else {
            // Create a new user
            $user = User::create([
                'name' => $socialUser->getName(),
                'email' => $socialUser->getEmail(),
                'password' => Hash::make(Str::random(24)),
                $provider . '_id' => $socialUser->getId(),
                'avatar' => $socialUser->getAvatar(),
                'provider' => $provider,
            ]);

            Auth::login($user);
        }

        return redirect()->intended('/dashboard');
    }
}
