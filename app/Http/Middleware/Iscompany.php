<?php

namespace App\Http\Middleware;

use Closure;

class Iscompany
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
         if (\Auth::user() &&  \Auth::user()->role == 2) {
            return $next($request);
     }

      return redirect('/');
    }
}
