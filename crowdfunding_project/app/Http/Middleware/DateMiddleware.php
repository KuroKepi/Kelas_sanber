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
        $current_date  = Carbon::now()->day;
        if($current_date >=9 && $current_date <= 10)
        {
            return $next($request);
        }
            return response()->json([
                'message'   => 'Belum tanggalnya'
            ]);
            // abort(403);
    }
}
