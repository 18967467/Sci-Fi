<?php

namespace App\Http\Middleware;
use Closure;
use Auth;
use Illuminate\Http\Response;
class AuthenticatedMiddleware
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
		if($request->user()&&$request->user()->privilege==100){
							return $next($request);

		}
		return redirect("home");

		


    }
}
