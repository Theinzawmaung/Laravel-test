<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class Manager
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
       if(!Auth::check()) {
           //Not Authenticated
         return redirect(route('login'));
           
          
       }
       else {
           //Authenticated
           if (Auth::user()->HasAnyRole(['admin','manager'])) {
            return $next($request);
           }
           else {
               return redirect( route('page.home') );
           }
       
         }
    
       
        
       
    }
}
