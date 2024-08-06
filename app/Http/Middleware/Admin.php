<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
use Spatie\Permission\Models\Role;

class Admin
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
                if(auth()->user()->hasAnyRole(['admin' ,'subadmin'])){
                        $allowAccess = true;
                }        
            }

            if(!$allowAccess) {
                return redirect('/');
            }

            return $next($request); 
    }
}

