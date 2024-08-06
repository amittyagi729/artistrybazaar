<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Seo
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
       $allowAccess = false;

            if(auth()->check())
            {
                if(auth()->user()->hasAnyRole(['admin' ,'seo'])){
                        $allowAccess = true;
                }        
            }

            if(!$allowAccess) {
                return redirect('/');
            }

            return $next($request); 
    }
}

