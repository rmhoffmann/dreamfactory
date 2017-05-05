<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Cache Store
    |--------------------------------------------------------------------------
    |
    | This option controls the default cache connection that gets used while
    | using this caching library. This connection is used when another is
    | not explicitly specified when executing a given caching function.
    |
    | Supported: "apc", "array", "database", "file", "memcached", "redis"
    |
    */

    'default' => env('CACHE_DRIVER', 'file'),

    /*
    |--------------------------------------------------------------------------
    | Cache Stores
    |--------------------------------------------------------------------------
    |
    | Here you may define all of the cache "stores" for your application as
    | well as their drivers. You may even define multiple stores for the
    | same cache driver to group types of items stored in your caches.
    |
    */

    'stores' => [

        'apc' => [
            'driver' => 'apc',
        ],

        'array' => [
            'driver' => 'array',
        ],

        'database' => [
            'driver' => 'database',
            'table' => env('CACHE_TABLE', 'cache'),
            'connection' => env('DB_CONNECTION', 'sqlite'),
        ],

        'file' => [
            'driver' => 'file',
            'path' => env('CACHE_PATH', storage_path('framework/cache/data')),
        ],
        'limit' => [
            'driver' => env('LIMIT_CACHE_DRIVER', 'file'),
            'file' => [
                'path'   => env('LIMIT_CACHE_PATH', storage_path('framework/limit_cache')),
            ],
            'redis' => [
                'client' => 'predis',
                'database' => env('LIMIT_CACHE_REDIS_DATABASE', 9),
                'host' => env('LIMIT_CACHE_REDIS_HOST', '127.0.0.1'),
                'port' => env('LIMIT_CACHE_REDIS_PORT', 6379),
                'password' => env('LIMIT_CACHE_REDIS_PASSWORD', null), // Needed by Redis Cloud and other similar services
            ]
        ],
        'memcached'  => [
            'driver' => 'memcached',
            'persistent_id' => env('MEMCACHED_PERSISTENT_ID'),
            'sasl' => [
                env('MEMCACHED_USERNAME'),
                env('MEMCACHED_PASSWORD'),
            ],
            'options' => [
                // Memcached::OPT_CONNECT_TIMEOUT  => 2000,
            ],
            'servers' => [
                [
                    'host' => env('MEMCACHED_HOST', '127.0.0.1'),
                    'port' => env('MEMCACHED_PORT', 11211),
                    'weight' => env('MEMCACHED_WEIGHT', 100),
                ],
            ],
        ],

        'redis' => [
            'driver' => 'redis',
            'connection' => env('CACHE_CONNECTION', 'default'),
        ],

        /** Managed instance limits cache */
        env('DF_LIMITS_CACHE_STORE', 'dfe-limits') => [
            'driver' => 'file',
            'path'   => env('DF_LIMITS_CACHE_PATH', storage_path('framework/cache')),
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Cache Key Prefix
    |--------------------------------------------------------------------------
    |
    | When utilizing a RAM based store such as APC or Memcached, there might
    | be other applications utilizing the same cache. So, we'll specify a
    | value to get prefixed to all our keys so we can avoid collisions.
    |
    */

    'prefix' => env('CACHE_PREFIX', 'dreamfactory'),

];
