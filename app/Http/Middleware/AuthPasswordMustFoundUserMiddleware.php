<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class AuthPasswordMustFoundUserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Session::get('auth', null);
        if ($user == null) {
            return redirect('/login')->withErrors([
                'msg' => 'Harap login terlebih dahulu!'
            ]);
        }else{
            return $next($request);
        }
    }
}
