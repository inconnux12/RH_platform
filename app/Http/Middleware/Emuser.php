<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Emuser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user=Auth::user();
        if($user && ($user->role == 1||$user->role == 2||$user->role == 3||$user->role == 4)){
            return $next($request);
        }
        else{
            return redirect()->route('login');
        }
    }
}
