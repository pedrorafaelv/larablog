<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// use Illuminate\Auth\Middleware\Authenticate as Middleware;

class CheckRol 
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
         if ( auth()->user()  ){

             return $next ($request);
         }
        
        return redirect('/');
    }

   
}
