<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
       if (Auth::guard($guard)->check()) {
            // echo "<pre>";print_r(Auth::guard($guard)->check());die();
          switch ($guard) {
                case 'admin':
                       return redirect('/admin');             
                    break;
                case 'voter':
                       return redirect('/voter');             
                    break;
                

                default:
                    return redirect('/user');             
                    break;
            }
        }


        return $next($request);
    }
}
