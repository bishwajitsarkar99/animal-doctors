<?php

use App\Support\Facades\Setting;

if(!function_exists('setting')){

    /**
     * @param string|array $key
     * @param mixed $default
     * 
     * @return mixed
     */
    function setting($key, $default = null) {
        
        if(is_string($key)){
            return Setting::get($key, $default);
        }

        if(is_array($key) && !empty($key)){
            foreach ($key as $k => $value) {
                Setting::set($k, $value);
            }
            return true;
        }
        return $default;
    }
}

?>