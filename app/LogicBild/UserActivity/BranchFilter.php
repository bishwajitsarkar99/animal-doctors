<?php

namespace App\LogicBild\UserActivity;

use Closure;

class BranchFilter
{
    protected $branchIds;

    public function __construct(array $branchIds)
    {
        $this->branchIds = $branchIds;
    }

    public function handle($query, Closure $next)
    {
        $query->whereIn('branch_id', $this->branchIds);
        return $next($query);
    }
}