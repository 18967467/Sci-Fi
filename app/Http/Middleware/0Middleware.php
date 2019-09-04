<?php

namespace App\Http\Middleware;

use Closure;

class 0Middleware
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
		if($request->user()&&request->user()->)
        return $next($request);
    }
}
