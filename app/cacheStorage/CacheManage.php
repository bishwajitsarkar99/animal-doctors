<?php

namespace App\CacheStorage;

use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;
use Illuminate\Support\Str;
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
        } elseif (is_null($branchId)) {
            $branchId = 'null';
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
    public static function clear($prefix, $branchId = null, $dateFormat = null)
    {
        $branchIdStr = is_array($branchId) ? implode('-', $branchId) : ($branchId ?? 'null');
        $key = "{$prefix}:{$branchIdStr}:" . ($dateFormat ?? now()->format('Y_m'));

        unset(self::$attributes[$key]);
        return Cache::forget($key);
    }
    /**
     * Remember or cache a complex object using consistent key.
     */
    public static function remember(
        string $prefix,
        \Closure $callback,
        $branchId = null,
        string $dateFormat = null,
        int $ttl = 600
    ) {
        $branchStr = is_array($branchId) ? implode('-', $branchId) : ($branchId ?? 'null');
        $dateStr = $dateFormat ?? now()->format('Y_m');
        $key = "{$prefix}:{$branchStr}:{$dateStr}";

        return Cache::store('redis')->remember($key, $ttl, $callback);
    }

    /**
     * Completely clear multiple cached datasets.
     */
    public static function clearMultiple(array $prefixes, string $branchId, ?string $dateSuffix = null)
    {
        $redis = Cache::store('redis')->getRedis();

        // Ensure you select the right Redis DB if needed
        if ($db = config('cache.redis.database')) {
            $redis->select($db);
        }

        foreach ($prefixes as $prefix) {
            // Build pattern including branchId and optional date suffix if used in keys
            $pattern = config('cache.prefix') . ':' . $prefix . ':' . $branchId;
            
            if ($dateSuffix) {
                $pattern .= ':' . $dateSuffix;
            }
            
            $pattern .= '*'; // wildcard to match all keys starting with this prefix

            // Get all matching keys
            $keys = $redis->keys($pattern);

            if (!empty($keys)) {
                // Delete all matching keys
                $redis->del($keys);
            }
        }
    }
}