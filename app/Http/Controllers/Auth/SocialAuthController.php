<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }


    // public function handleGoogleCallback()
    // {
    //     try {
    //         // Retrieve user details from Google
    //         $googleUser = Socialite::driver('google')->stateless()->user();

    //         // Check if a user with the provided email already exists
    //         $user = User::where('email', $googleUser->getEmail())->first();

    //         if (!$user) {
    //             // If user doesn't exist, create a new one
    //             $user = User::create([
    //                 'name' => $googleUser->getName(),
    //                 'email' => $googleUser->getEmail(),
    //                 'password' => Hash::make(str_random(24)), // Generate a random password
    //             ]);
    //         }

    //         // Log in the user
    //         Auth::login($user);

    //         // Redirect the user to the home page
    //         return redirect(RouteServiceProvider::HOME);
    //     } catch (\Exception $e) {
    //         // Handle any exceptions that occur during the process
    //         return redirect()->back()->withErrors(['error' => 'An error occurred during the authentication process. Please try again later.']);
    //     }

    // }

}
