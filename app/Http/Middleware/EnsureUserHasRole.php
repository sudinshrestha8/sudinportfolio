<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserHasRole
{
    /**
     * Gate-keep routes by role.
     *
     * Usage in routes:
     *   ->middleware('role:user')   — only the 'user' role may pass
     *   ->middleware('role:admin')  — only the 'admin' role may pass
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (! Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->role !== $role) {
            return Auth::user()->isAdmin()
                ? redirect('/admin')
                : redirect()->route('portfolio');
        }

        return $next($request);
    }
}
