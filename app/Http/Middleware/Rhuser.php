<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Rhuser
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
        if($user && ($user->role == 1||$user->role==3)){
            return $next($request);
        }
        else if($user && ($user->role != 1||$user->role!=3)){
            return redirect()->route('dashboard')->with('status','vous avez pas les permission');
        }
        else{
            return redirect()->route('login');
        }
    }
}
