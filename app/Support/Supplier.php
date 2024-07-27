<?php
namespace App\Support;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class Supplier
{
    private $CACHE_KEY = "app_supplier_settings";
    private $TABLE_NAME = 'supplier_settings';

    public $attributes = [];

    public function all()
    {
        if (!empty($this->attributes)) {
            return $this->attributes;
        }

        $this->attributes = Cache::rememberForever($this->CACHE_KEY, function () {
            $items = DB::table($this->TABLE_NAME)->get();

            $attributes = [];
            foreach ($items as $item) {
                $attributes[$item->key] = $item->value;
            }
            return $attributes;
        });

        return $this->attributes;
    }

    public function get(string $key, $default = null)
    {
        if (!$this->has($key)) {
            return $default;
        }

        return $this->attributes[$key];
    }

    public function has(string $key)
    {
        $attributes = $this->all();
        return isset($attributes[$key]);
    }

    public function set(string $key, $value)
    {
        $status = false;
        if ($this->has($key)) {
            $status = DB::table($this->TABLE_NAME)->where('key', $key)->update([
                'value' => "" . $value,
            ]);
        } else {
            $status = DB::table($this->TABLE_NAME)->insert([
                'key' => $key,
                'value' => "" . $value,
            ]);
        }

        if ($status) {
            $this->attributes[$key] = $value;
            Cache::forever($this->CACHE_KEY, $this->attributes);
        }

        return $status;
    }

    public function forget(string $key)
    {
        if (!$this->has($key)) {
            return false;
        }
        $status = DB::table($this->TABLE_NAME)->where('key', $key)->delete();

        if ($status) {
            unset($this->attributes[$key]);
            Cache::forever($this->CACHE_KEY, $this->attributes);
        }

        return $status;
    }
}
