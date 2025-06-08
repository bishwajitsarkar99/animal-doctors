<?php
namespace App\LogicBild\UserActivity;

use Closure;

class RoleFilter
{
    public function handle($query, Closure $next)
    {
        if ($role = request('role')) {
            $query->where('role', $role);
        }

        return $next($query);
    }
}