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
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verifica si el usuario está autenticado y tiene el rol de "admin"
        if (Auth::check() && Auth::user()->rol === '1') {
            // Si el usuario es administrador, permite continuar
            return $next($request);
        }

        // Si no es administrador, redirige o lanza un error
        return redirect('/')->with('error', 'No tienes acceso a esta sección');
    }
}
