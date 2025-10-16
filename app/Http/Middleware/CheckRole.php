<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle($request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();

        // Pastikan user punya kolom 'role'
        if (!in_array($user->role, $roles)) {
            abort(403, 'Unauthorized'); // Ini yg bikin "Forbidden"
        }

        return $next($request);
    }
}
