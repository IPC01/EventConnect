<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if (Auth::check()) {
            // Verifica se o usuário tem role 1 (Admin) ou role 2 (Company)
            if (!Auth::user()->role == 1 || !Auth::user()->role == 2) {
                return $request->expectsJson() ? null : route('login');
            }
        }else{
            return $request->expectsJson() ? null : route('login');

        }
    }
}
