<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$role): Response
    {    if (!$request->user() || !$request->user()->hasRole($role)) {
        // Si l'utilisateur n'a pas le rôle, redirige-le
        return redirect()->route('home')->with('error', 'Connectez-vous !.');
         }
    return $next($request);
    }
}
