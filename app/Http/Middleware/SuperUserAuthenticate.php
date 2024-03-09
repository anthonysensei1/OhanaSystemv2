<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SuperUserAuthenticate
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
        $response = $next($request);

        $response->header('Cache-Control', 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0, max-age=0');
        $response->header('Pragma', 'no-cache');
        $response->header('Expires', 'Sat, 01 Jan 2000 00:00:00 GMT');

        if (auth()->check() && auth()->user()->user_type == '2') {
            abort(403, 'Unauthorized');
        }

        return $response;
    }
}
