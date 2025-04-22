<?php

namespace App\Http\Controllers;
use App\Models\Content;
use App\Models\Video;
use App\Models\Audio;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{ 
    public function landing()
{
    $contents = Content::latest()->take(9)->get(); 
    return view('welcome', compact('contents'));
}

    public function index()
    {
        return view('layouts.dashboard'); // Crée ce fichier si besoin
    }
    // Méthode pour la page de découverte (accessible uniquement aux utilisateurs connectés)
    public function discover()
    {
      // S'il est connecté, affiche la vue
      $contents = Content::all();
        return view('accueil', compact('contents')); // ou autre vue sécurisée
    }
    
}
