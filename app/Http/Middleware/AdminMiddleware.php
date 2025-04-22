<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$role='admin'): Response
    {
        if (Auth::check() && $request->user()->hasRole($role)) {
            return $next($request);
        }

        // Redirect unauthorized users to the home page with an error message
        return redirect()->route('home')->with('error', 'Accès refusé.');
    }
    }


