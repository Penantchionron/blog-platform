<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function landing()
    {   if (Auth::check()) {
        return redirect()->route('accueil');
        }
        return view('welcome');
    }

    public function discover()
    {
        return view('accueil');
    }
}