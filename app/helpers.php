<?php

use Illuminate\Support\Facades\DB;

if (!function_exists('site_settings')) {
    /**
     * Retrieve site settings
     *
     * @return stdClass|null
     */
    function site_settings(): ?stdClass
    {
        return DB::table('settings')->where('id', 1)->first();
    }
}

if (!function_exists('uniqueId')) {
    /**
     * Generate a unique ID.
     *
     * @return string A unique ID.
     */
    function uniqueId(): string
    {
        return substr(number_format(time() * rand(), 0, '', ''), 0, 12);
    }
}

if (!function_exists('isActive')) {
    /**
     * Check if the current route matches any of the given routes.
     *
     * @param array|string $routes Route name or array of route names
     * @param string $class Class to return if active
     * @return string
     */
    function isActive(array|string $routes, string $class = 'active'): string
    {
        return request()->routeIs($routes) ? $class : '';
    }
}
