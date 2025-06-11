<?php
    
    namespace App\Helpers;

    class helper
    {
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
    }


?>