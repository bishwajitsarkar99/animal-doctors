<?php

namespace App\Http\Middleware\Supplier;

use Closure;
use Illuminate\Http\Request;
use App\Models\Supplier\SupplierPermission;

class SupplierView
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
        $user = $request->user();
        if (!$user) {
            return abort(418, 'Unauthorized');
        }

        $userEmail = $user->email;

        $roles = SupplierPermission::where('view_status', '!=', 0)
                    ->orderBy('id', 'desc')
                    ->pluck('user_roles_id')
                    ->toArray();

        $accessPermissions = SupplierPermission::where('user_emails_id', $userEmail)
                                ->orWhere('view_status', 1)
                                ->orderBy('id', 'desc')
                                ->get();

        $hasPermission = $accessPermissions->contains(function ($permission) use ($userEmail) {
            return $permission->user_emails_id == $userEmail || $permission->view_status == 1;
        });

        if (in_array($user->role, $roles) && $hasPermission) {
            return $next($request);
        } else {
            return abort(418, 'Unauthorized');
        }
    }
}
