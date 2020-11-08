<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user()->status())
        {
            return $next($request);
        }
        else
        {
            // abort(405);
            return response()->json([
                'message' => 'Anda bukan admin'
            ]);
        }
    }
}
