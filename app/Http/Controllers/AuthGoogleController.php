<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthGoogleController extends Controller
{
    public function logingoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function callbackGoogle()
    {
        $callback = Socialite::driver('google')->stateless()->user();

        $data = [
            'name'              => $callback->getName(),
            'email'             => $callback->getEmail(),
            'email_verified_at' => now(),
            'role_id'           => '070700d6-59d8-4fef-8eb0-2406a66f30ff'
        ];

        $user = User::whereEmail($data['email'])->first();

        // return $data;
        if (!$user) {
            $user = User::create($data);
        }
        Auth::login($user, true);

        return to_route('donasi');
    }
}
