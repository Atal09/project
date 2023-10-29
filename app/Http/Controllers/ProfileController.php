<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    // Constructor voor de controller met middleware voor authenticatie
    public function __construct()
    {
        $this->middleware('auth');
    }
    // Methode om het gebruikersprofiel weer te geven
    public function user()
    {
        return view('profile.home');
    }


    // Methode om het bewerken van het profiel mogelijk te maken
    public function edit(User $user)
    {
        if (Auth::user()->id !== $user->id) {
            return redirect()->route('profile.home');
        }

        return view('profile.edit', compact('user'));
    }
    // Methode om het gebruikersprofiel bij te werken
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
        ]);
        // Werk de naam en e-mail van de gebruiker bij
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();
    // Doorverwijzen naar de productpagina met een melding dat het profiel is bijgewerkt
        return redirect()->route('product.product')->with('updated', true);
    }

}
