<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('modules.accueil'); // Crée ce fichier si besoin
    }
    public function modules()
    {
        return view('layouts.dashboard'); // Crée ce fichier si besoin
    }
}
