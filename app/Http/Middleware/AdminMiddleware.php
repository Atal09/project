<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Controleer of er geen ingelogde gebruiker is of de ingelogde gebruiker geen beheerder is
        if (!auth()->check() || !auth()->user()->isAdmin()) {
            // Als de voorwaarden niet zijn voldaan, geef een HTTP 403-fout (Toegang geweigerd)
            abort(403);
        }
        return $next($request);
    }

}
