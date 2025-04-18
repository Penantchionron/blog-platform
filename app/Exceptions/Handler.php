<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Auth\Access\AuthorizationException;
class Handler extends ExceptionHandler
{
    /**
     * Une liste des types d'exceptions qui ne doivent pas être signalées.
     */
    protected $dontReport = [];

    /**
     * Une liste des entrées qui ne doivent jamais être flashées pour la validation.
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Enregistre les gestionnaires d'exceptions pour l'application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
    public function render($request, Throwable $exception)
{
    if ($exception instanceof AuthorizationException) {
        return redirect()->route('accueil')->with('error', 'Accès refusé.');
    }

    return parent::render($request, $exception);
}

    /**
     * Gère les redirections des utilisateurs non authentifiés.
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['message' => $exception->getMessage()], 401);
        }

        return redirect()->route('home'); // Tu peux changer 'home' par 'welcome' ou toute autre route
    }
}