<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdminStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Tarkista että haun tekevä käyttäjä on edes kirjautunut.
        if (Auth::check()) {
			
            // Tarkista onko admin
            if (Auth::user()->admin === 1) {
                // Admin fo sho
                return $next($request);
            } else {
                // Ei ole admin
                return redirect()->route('welcome');
            }
        }

        // Ei ole kirjautunut.
        return redirect()->route('login');
    }
}
