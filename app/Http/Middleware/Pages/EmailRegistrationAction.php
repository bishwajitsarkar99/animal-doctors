<?php

namespace App\Http\Middleware\Pages;

use Closure;
use Illuminate\Http\Request;
use App\Models\AuthPages;
class EmailRegistrationAction
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
        $accessPermissions = AuthPages::where('page_route', '/registration-form')
            ->where('status', 1)
            ->get();

        if ($accessPermissions->isNotEmpty()) {
            return $next($request);
        } else {
            return abort(500, 'Unauthorized');
        }
    }
}
