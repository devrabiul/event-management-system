<?php

if (!function_exists('getDynamicAsset')) {
    function getDynamicAsset($path = null): string
    {
        if (SYSTEM_PROCESSING_DIRECTORY == 'public') {
            return asset("$path");
        } else {
            return asset("public/$path");
        }
    }
}

if (!function_exists('getEventTypes')) {
    function getEventTypes()
    {
        return \App\Models\Event::get()?->pluck('type')?->toArray();
    }
}
