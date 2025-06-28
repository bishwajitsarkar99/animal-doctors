<?php
    
    namespace App\Helpers;
    use Carbon\Carbon;

    class Helper
    {
        // Private ID Generator 
        public static function IDGenerator($model, $trow, $prefix, $length = 4){
            $data = $model::orderBy('id', 'desc')->first();

            if (! $data) {
                $og_length = $length;
                $last_number = '';
            } else {
                $code = substr($data->$trow, strlen($prefix) + 1);
                $actial_last_number = ((int)$code);
                $increment_last_number = $actial_last_number + 1;
                $last_number_length = strlen($increment_last_number);
                $og_length = $length - $last_number_length;
                $last_number = $increment_last_number;
            }

            $zeros = str_repeat('0', $og_length);
            return $prefix . '-' . $zeros . $last_number;
        }
        // Time Generator From Now example--- [2 months 4 days 5 hrs 12 mins]
        public static function getTimeDifferenceCurrent($start)
        {
            $now = Carbon::now();
            $startDate = Carbon::parse($start);

            $months = $startDate->diffInMonths($now);
            $adjusted = $startDate->copy()->addMonths($months);
            $days = $adjusted->diffInDays($now);
            $adjusted = $adjusted->copy()->addDays($days);
            $hours = $adjusted->diffInHours($now);
            $minutes = $adjusted->copy()->addHours($hours)->diffInMinutes($now);

            $str = '';
            if ($months > 0) $str .= "$months months ";
            if ($days > 0) $str .= "$days days ";
            if ($hours > 0) $str .= "$hours hrs ";
            $str .= "$minutes mins";

            return trim($str);
        }
    }


?>