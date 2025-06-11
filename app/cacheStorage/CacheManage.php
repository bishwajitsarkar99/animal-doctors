<?php

namespace App\CacheStorage;

use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

class CacheManage
{
    protected static $attributes = [];

    /**
     * Generate a consistent cache key.
     */
    public static function generateKey(string $prefix, $branchId = null, string $dateFormat = null)
    {
        if ($dateFormat === '5min') {
            $now = now();
            $minutes = floor($now->minute / 5) * 5;
            $dateFormat = $now->format("Y_m_d_H_") . str_pad($minutes, 2, '0', STR_PAD_LEFT);
        }

        // Convert branchId array to string if needed
        if (is_array($branchId)) {
            $branchId = implode('_', $branchId);
        }

        return collect([$prefix, $branchId, $dateFormat])
            ->filter()
            ->implode('_');
    }

    /**
     * Get all cached items for a key group.
     */
    public static function all(string $prefix, $branchId = null, string $dateFormat = null)
    {
        $key = self::generateKey($prefix, $branchId, $dateFormat);

        if (!isset(self::$attributes[$key])) {
            self::$attributes[$key] = Cache::remember($key, now()->addMinutes(10), fn () => []);
        }

        return self::$attributes[$key];
    }

    /**
     * Get a specific item from cache.
     */
    public static function get(string $prefix, string $itemKey, $branchId = null, string $dateFormat = null, $default = null)
    {
        $items = self::all($prefix, $branchId, $dateFormat);

        return $items[$itemKey] ?? $default;
    }

    /**
     * Check if a cache item exists.
     */
    public static function has(string $prefix, string $itemKey, $branchId = null, string $dateFormat = null)
    {
        $items = self::all($prefix, $branchId, $dateFormat);

        return isset($items[$itemKey]);
    }

    /**
     * Set a cache item.
     */
    public static function set(string $prefix, string $itemKey, $value, $branchId = null, string $dateFormat = null, $ttl = 600)
    {
        $key = self::generateKey($prefix, $branchId, $dateFormat);

        $items = self::all($prefix, $branchId, $dateFormat);
        $items[$itemKey] = $value;

        self::$attributes[$key] = $items;

        return Cache::put($key, $items, now()->addSeconds($ttl));
    }

    /**
     * Forget a cache item.
     */
    public static function forget(string $prefix, string $itemKey, $branchId = null, string $dateFormat = null)
    {
        $key = self::generateKey($prefix, $branchId, $dateFormat);
        $items = self::all($prefix, $branchId, $dateFormat);

        if (!isset($items[$itemKey])) {
            return false;
        }

        unset($items[$itemKey]);
        self::$attributes[$key] = $items;

        return Cache::put($key, $items, now()->addMinutes(10));
    }

    /**
     * Completely clear cached dataset.
     */
    public static function clear(string $prefix, $branchId = null, string $dateFormat = null)
    {
        $key = self::generateKey($prefix, $branchId, $dateFormat);
        unset(self::$attributes[$key]);

        return Cache::forget($key);
    }

    /**
     * Remember or cache a complex object using consistent key.
     */
    // public static function remember(string $prefix, \Closure $callback, $branchId = null, string $dateFormat = null, $ttl = 600)
    // {
    //     $key = self::generateKey($prefix, $branchId, $dateFormat);

    //     // Check if already cached
    //     if (Cache::has($key)) {
    //         return Cache::get($key);
    //     }
    //     // Generate new value
    //     $newValue = $callback();
    //     // Cache it
    //     Cache::put($key, $newValue, now()->addSeconds($ttl));

    //     return $newValue;
    // }
    public static function remember(
        string $prefix,
        \Closure $callback,
        $branchId = null,
        string $dateFormat = null,
        int $ttl = 600,
        bool $checkDiff = false
    ) {
        $key = self::generateKey($prefix, $branchId, $dateFormat);

        // Always try to read from cache
        $existing = Cache::get($key);

        if ($existing !== null) {
            if (!$checkDiff) {
                return $existing;
            }

            // For big data: compare values
            $newValue = $callback();
            if (md5(serialize($existing)) === md5(serialize($newValue))) {
                return $existing; // No change, skip disk write
            }

            // Value changed, update cache
            Cache::put($key, $newValue, now()->addSeconds($ttl));
            return $newValue;
        }

        // Cache is missing – generate and store
        $newValue = $callback();
        Cache::put($key, $newValue, now()->addSeconds($ttl));
        return $newValue;
    }
}