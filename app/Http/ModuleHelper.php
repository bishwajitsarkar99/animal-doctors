<?php

use App\Support\Facades\Supplier;

if(!function_exists('supplier')){

    /**
     * @param string|array $key
     * @param mixed $default
     * 
     * @return mixed
     */
    function supplier($key, $default = null) {
        
        if(is_string($key)){
            return Supplier::get($key, $default);
        }

        if(is_array($key) && !empty($key)){
            foreach ($key as $k => $value) {
                Supplier::set($k, $value);
            }
            return true;
        }
        return $default;
    }
}

?>