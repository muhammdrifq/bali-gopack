<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\app\Tb_auth;
use Illuminate\Http\Request;

class adminPresensi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Tb_auth::where('email', $request->email)->first();
        if (!$user::check()) {
            return redirect()->route('login');
        }
        if ($user->role == 'customer') {
            return redirect()->route('customer/dashboard');
        }
    }
}
