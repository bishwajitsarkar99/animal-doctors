<?php
namespace App\LogicBild\UserActivity;

use Closure;
use Carbon\Carbon;

class DateFilter
{
    public function handle($query, Closure $next)
    {
        $start_date = request('start_date');
        $end_date = request('end_date');

        if ($start_date && $end_date) {
            $start = Carbon::parse($start_date)->startOfDay();
            $end = Carbon::parse($end_date)->endOfDay();
            $query->whereBetween('created_at', [$start, $end]);
        } else {
            $query->whereBetween('created_at', [
                Carbon::now()->startOfDay(),
                Carbon::now()->endOfDay()
            ]);
        }

        return $next($query);
    }
}