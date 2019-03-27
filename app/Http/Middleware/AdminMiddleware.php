<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
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
        /*if(!auth()->check()){
            return redirect('login');
        }*/
        
        if(!auth()->user()->admin){ //Si el usuario autenticado no es admin
            return redirect('login');
        }


        return $next($request);
    }
}
