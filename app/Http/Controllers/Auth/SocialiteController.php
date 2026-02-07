<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SocialiteController extends Controller
{
    public function redirect($provider)
    {
        $valid = ['github', 'google'];
        if (!in_array($provider, $valid)) {
            abort(404);
        }

        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        try {
            $socialUser = Socialite::driver($provider)->user();
        } catch (\Exception $e) {
            return redirect('/')->with('error', 'Login failed. Please try again.');
        }

        // Find user by email
        $user = User::where('email', $socialUser->getEmail())->first();

        if ($user) {
            // Existing user → update provider ID if missing
            if (!$user->{$provider . '_id'}) {
                $user->update([$provider . '_id' => $socialUser->getId()]);
            }
        } else {
            // New user → create account
            $user = User::create([
                'name'     => $socialUser->getName() ?? $socialUser->getNickname() ?? 'User',
                'email'    => $socialUser->getEmail(),
                'password' => bcrypt(Str::random(24)),
                $provider . '_id' => $socialUser->getId(),
                'email_verified_at' => now(),
            ]);
        }

        // Optional: Save avatar
        if (!$user->avatar && $socialUser->getAvatar()) {
            $user->avatar = $socialUser->getAvatar();
            $user->save();
        }

        Auth::login($user);

        return redirect('/'); // or wherever you want
    }
}