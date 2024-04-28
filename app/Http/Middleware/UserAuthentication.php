<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthentication
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
        if(auth()->user() && auth()->user()->role == 0 && auth()->user()->status == 0){
            return $next($request);
        }
        else{
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            // return redirect('/')->with('error', 'Your Account is unauthorized.');
        }
        // return redirect('/');
        return abort(403, 'Unauthorized');
    }
}
