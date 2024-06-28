<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Permission\InventoryAccessPermission;

class InventoryPermission
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
            return abort(403, 'Unauthorized');
        }
        
        $userEmail = $user->email;
        
        $roles = InventoryAccessPermission::where('permission_status', '!=', 0)
                    ->orderBy('id', 'desc')
                    ->pluck('roles_id')
                    ->toArray();

        $accessPermissions = InventoryAccessPermission::where('emails_id', $userEmail)
                                ->orWhere('permission_status', 1)
                                ->orderBy('id', 'desc')
                                ->get();

        $hasPermission = $accessPermissions->contains(function ($permission) use ($userEmail) {
            return $permission->email_id == $userEmail || $permission->permission_status == 1;
        });

        if (in_array($user->role, $roles) && $hasPermission) {
            return $next($request);
        } else {
            return abort(403, 'Unauthorized');
        }

    }

}
