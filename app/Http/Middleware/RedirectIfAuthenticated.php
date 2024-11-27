<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
<<<<<<< HEAD
use Symfony\Component\HttpFoundation\Response;
=======
>>>>>>> 208d5f64330d0f6451854dc486b2ffafe9860416

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
<<<<<<< HEAD
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
=======
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
>>>>>>> 208d5f64330d0f6451854dc486b2ffafe9860416
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
<<<<<<< HEAD
                $user = Auth::user();
                
                // Redirect berdasarkan role pengguna
                if ($user->role == 'admin') {
                    return redirect()->route('admin');
                } elseif ($user->role == 'manajer') {
                    return redirect()->route('manajer');
                } elseif ($user->role == 'pegawai') {
                    return redirect()->route('pegawai');
                }
=======
                return redirect(RouteServiceProvider::HOME);
>>>>>>> 208d5f64330d0f6451854dc486b2ffafe9860416
            }
        }

        return $next($request);
    }
}
