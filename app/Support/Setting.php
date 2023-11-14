<?php

namespace App\Support;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class Setting{

    private  $CACHE_KEY = "app_settings";
    private  $TABLE_NAME = 'settings';

    /**
     * @var array
     */
    public $attributes = [];

    

    public function all() {

        if(!empty($this->attributes)) {
            return $this->attributes;
        }

        $this->attributes = Cache::rememberForever($this->CACHE_KEY, function () {
            $items =  DB::table($this->TABLE_NAME)->get();

            $attributes = [];
            foreach ($items as  $item) {
                $attributes[$item->key] = $item->value;
            }
            return  $attributes;
        });

        return $this->attributes;
    }

    public function get(string $key, $default = null) {

        if($this->has($key) == false){
            return  $default;
        }

        $value = $this->attributes[$key];

        return  $value;
    }

    /**
     * @param string $key
     * @return boolean
     */
    public function has(string $key) {

        $attributes  = $this->all();
        
        return isset($attributes[$key]) == true;
    }

    /**
     * @param string $key
     * @param mixed $value
     * 
     * @return boolean
     */
    public function set(string $key, $value) {
        
        $status = false;
        if($this->has($key)){
            $status =  $this->db()->where('key', $key)->update([
                'value' =>"" .  $value,
            ]);
        }else {
            $status =  $this->db()->insert([
                'key' => $key,
                'value' => "" . $value,
            ]);
        }


        if($status){
            $this->attributes[$key] = $value;
            Cache::forever($this->CACHE_KEY, $this->attributes);
        }

        return $status;
    }

    /**
     * @param stirng $key
     * @return boolean
     */
    public function forget(string $key) {

        if($this->has($key) == false){
            return false;
        }
        $status = $this->db()->where('key', $key)->delete();

        if($status){
            unset($this->attributes[$key]);
            Cache::forever($this->CACHE_KEY, $this->attributes);
        }

        return $status;
    }


    private function db() {
        return DB::table($this->TABLE_NAME);
    }
}