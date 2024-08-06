<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
use Spatie\Permission\Models\Role;

class UserCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
            $allowAccess = false;

            if(auth()->check())
            {
                if(auth()->user()->hasRole('user')){
                        $allowAccess = true;
                }        
            }

            if(!$allowAccess) {
                return redirect('/');
            }

            return $next($request); 
    }
}
