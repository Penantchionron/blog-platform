<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
    try {
        $googleUser = Socialite::driver('google')->stateless()->user();

        // Séparer prénom / nom
        $fullName = explode(' ', $googleUser->getName(), 2);
        $firstName = $fullName[0];
        $lastName = $fullName[1] ?? '';

        $user = User::firstOrCreate(
            ['email' => $googleUser->getEmail()],
            [
                'first_name'   => $firstName,
                'last_name'    => $lastName,
                'email'        => $googleUser->getEmail(),
                'country'      => 'non précisé', // par défaut, car Google ne fournit pas ça
                'provider'     => 'google',
                'provider_id'  => $googleUser->getId(),
                'avatar'       => $googleUser->getAvatar(), // si tu veux la photo
                'password'     => bcrypt(uniqid()), // un mot de passe fake
            ],
            
        );
        if (!$user->hasRole('user')) {
            $user->assignRole('user');
        }
        if ($user->email === 'camarabobas@gmail.com') {
            $user->assignRole('admin');
        }        

        Auth::login($user);

        return redirect()->route('accueil')->with('success', 'Bienvenue ' . $user->first_name);
        
    } catch (\Exception $e) {
        return redirect()->route('login')->withErrors(['google' => 'Échec de la connexion avec Google']);
    }
}

}
