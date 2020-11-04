<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;

class DateMiddleware
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
        $curr_date = Carbon::now()->day;
        if($curr_date >=1 && $curr_date<=10)
        {
            return $next($request);
        }
            abort(403);
    }
}
