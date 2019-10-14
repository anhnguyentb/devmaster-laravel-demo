<?php

namespace App\Http\Middleware;

use Closure;

class CheckAge
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
        $age = $request->get('age', 0);
        if($age > 0 && $age <= 100) {
            echo "Age is allow";
        }
        return $next($request);
    }
}
