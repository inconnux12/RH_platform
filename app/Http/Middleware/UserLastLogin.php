<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class UserLastLogin
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
        if (auth()->check()) {
            $expiresAt = Carbon::now()->addSeconds(20);
            Cache::put('user-is-online-' . auth()->user()->id, true, $expiresAt);
            // last seen
            User::where('id', auth()->user()->id)->update(['last_loged' => (new \DateTime())->format("Y-m-d H:i:s")]);
        }
        return $next($request);
    }
}
