<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
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
        /*
         * First check it is login route
         */
        if (Route::current()->getName() == "admin.login") {
            /*
             * If login route then check Auth remember
             */

            if (Auth::guard('admin')->check()) {
                /*
                 * if available then redirect to admin dashboard
                 */

                return redirect()->route('admin.dashboard');
            }
            /*
             * Other wise go to next request
             */
            return $next($request);
        }
        /*
         * Else not the login route
         */ else {
            /*
             * Check admin auth available or note
             */
            if (Auth::guard('admin')->check()) {
                /*
                 * if available then go to next request
                 */
                return $next($request);
            }
            /*
             * /Other wise redirect back to login page
             */
            return redirect()->route('admin.login');
        }
    }
}
