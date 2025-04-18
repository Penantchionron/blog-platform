<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function landing()
    {// Si l'utilisateur n'est pas connecté, affiche la vue d'accueil
        return view('welcome');
    }
    public function index()
    {
        return view('layouts.dashboard'); // Crée ce fichier si besoin
    }
    // Méthode pour la page de découverte (accessible uniquement aux utilisateurs connectés)
    public function discover()
    {
      // S'il est connecté, affiche la vue
        return view('accueil'); // ou autre vue sécurisée
    }
    
}
