<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Affiche la page de profil.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Met à jour les infos de profil de base (via Breeze).
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Supprime le compte utilisateur.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect()->route('home');
    }

    /**
     * Met à jour toutes les infos : user info + mot de passe
     */
    public function fullUpdate(Request $request): RedirectResponse
    {
        $user = Auth::user();
    
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name'  => ['required', 'string', 'max:255'],
            'country'    => ['nullable', 'string', 'max:255'],
            'email'      => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'current_password' => ['required', 'current_password'],
            'password'   => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    dd($user);
        $user->update([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'country'    => $request->country,
            'email'      => $request->email,
            'password'   => Hash::make($request->password),
        ]);
    

        // Déconnecter l'utilisateur et le rediriger vers login
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect::route('home')->with('status', 'Votre mot de passe a été modifié. Veuillez vous reconnecter.');
    }
    
}
