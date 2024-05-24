<?php

if (!function_exists('currencyPosition')) {

    function currencyPosition($price)
    {
        if (config('settings.currency_position') == 'Left') {
            return config('settings.currency_icons') . $price;
        }

        if (config('settings.currency_position') == 'Right') {
            return $price . config('settings.currency_icons');
        }
    }
}



if (!function_exists('discountInPercent')) {
    function discountInPercent($originalPrice, $discountPrice = 0)
    {
        $percentages = (($originalPrice - $discountPrice) / $originalPrice) * 100;
        return round($percentages, 2);
    }
}



if (!function_exists('truncate')) {
    function truncate($text, $limit = 60)
    {
        return \Str::limit($text, $limit, '...');
    }
}



if (!function_exists('setSidebarActive')) {
    function setSidebarActive(array $routes)
    {
        foreach ($routes as $route) {
            if (request()->routeIs($route)) {
                return 'active';
            }
        }

        return '';
    }
}



// if (!function_exists('getYtThumbnail')) {
//     function getYtThumbnail($link, $quality = 'medium')
//     {
//         $videoId = explode("?v=", "https://www.youtube.com/watch?v=uZobyvQIRik&ab_channel=GreatIndianAsmr");
//         $videoId = $videoId[1];

//         $finalQuality = [
//             'low'                   => 'sddefault',
//             'medium'                => 'mqdefault',
//             'high'                  => 'hqdefault',
//             'max'                   => 'maxresdefault',

//         ];

//         return "https://www.img.youtube.com/vi/$videoId/$finalQuality.jpg";
//     }
// }
