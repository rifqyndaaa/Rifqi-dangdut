<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|array  $role
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, $string ,$role): Response
    {
        if (!Auth::check()) {
            return redirect()->route('auth.index')
                ->withErrors('Silahkan login terlebih dahulu!');
        }

        // Bisa menerima beberapa role, dipisah koma
        $roles = is_array($role) ? $role : explode('|', $role);

        if (in_array(Auth::user()->role, $roles)) {
            return $next($request);
        }

        return abort(403, 'Anda tidak memiliki akses ke halaman ini.');
    }
}
