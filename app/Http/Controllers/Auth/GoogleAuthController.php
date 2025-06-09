<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Two\GoogleProvider;

class GoogleAuthController extends Controller
{
   private function googleProvider()
    {
        return Socialite::buildProvider(GoogleProvider::class, [
            'client_id' => env('GOOGLE_CLIENT_ID'),
            'client_secret' => env('GOOGLE_CLIENT_SECRET'),
            'redirect' => env('GOOGLE_REDIRECT_URI'),
        ]);
    }

    public function redirectToGoogle()
    {
        return $this->googleProvider()->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleUser = $this->googleProvider()->stateless()->user();

        $user = User::updateOrCreate([
            'email' => $googleUser->getEmail(),
        ], [
            'name' => $googleUser->getName(),
            'google_id' => $googleUser->getId(),
            'avatar' => $googleUser->getAvatar(),
        ]);

        Auth::login($user);

        return redirect()->route('dashboard');
    }
}
