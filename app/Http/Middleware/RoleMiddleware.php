<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role = "")
    {
        $status = false;
        $roles = \explode('|', $role);

        foreach ($roles as $value) {
            if($this->hasRole($value) ){
                $status = true;
                break;
            }
        }

        if($status == false){
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }


    /**
     * @param string $roleName
     * 
     * @return boolean
     */
    private function hasRole(string $roleName) {

        $roles = ['SuperAdmin', 'SubAdmin', 'Admin', 'User', 'Accounts', 'Marketing', 'Delivery Team'];

        return \in_array($roleName, $roles);
    }
}
