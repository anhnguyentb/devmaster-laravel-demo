<?php

namespace App\Http\Middleware;

use Closure;

class SecondPriorityMiddleware
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
        echo "SecondPriorityMiddleware <br/>";
        return $next($request);
    }
}
