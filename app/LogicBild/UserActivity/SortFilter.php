<?php
namespace App\LogicBild\UserActivity;

use Closure;

class SortFilter
{
    public function handle($query, Closure $next)
    {
        $sortField = request('sort_field', 'id');
        $sortDirection = request('sort_direction', 'desc');

        $query->orderBy($sortField, $sortDirection);

        return $next($query);
    }
}