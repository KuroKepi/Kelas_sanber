<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class EmailMiddleware
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
        if(Auth::user()->verif())
        {
            return $next($request);
        }
        else
        {
            abort(404);
        }
    }
}
