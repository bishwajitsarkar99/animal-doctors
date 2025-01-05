<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckLoginCompletion
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
        // Get the email from the request
        $email_request = $request->input('email');

        // Check if the email is not empty
        if (!empty($email_request)) {
            // Proceed to the next request
            return $next($request);
        } else {
            // If email is empty, abort with unauthorized response
            return abort(500, 'Unauthorized: Email is required.');
        }
    }
}
