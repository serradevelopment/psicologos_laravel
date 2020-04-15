<?php

return [
    'name' => 'EuTeApoio',
    'manifest' => [
        'name' => env('APP_NAME', 'Eu Te Apoio'),
        'short_name' => 'EuTeApoio',
        'start_url' => '/',
        'background_color' => '#e5f6fb',
        'theme_color' => '#e5f6fb',
        'display' => 'standalone',
        'orientation'=> 'any',
        'icons' => [
            '512x512' => '/img/eu-te-apoio-logo.png'
        ],
        'splash' => [
            '640x1136' => '/img/eu-te-apoio-logo.png',
            '750x1334' => '/img/eu-te-apoio-logo.png',
            '828x1792' => '/img/eu-te-apoio-logo.png',
            '1125x2436' => '/img/eu-te-apoio-logo.png',
            '1242x2208' => '/img/eu-te-apoio-logo.png',
            '1242x2688' => '/img/eu-te-apoio-logo.png',
            '1536x2048' => '/img/eu-te-apoio-logo.png',
            '1668x2224' => '/img/eu-te-apoio-logo.png',
            '1668x2388' => '/img/eu-te-apoio-logo.png',
            '2048x2732' => '/img/eu-te-apoio-logo.png',
        ],
        'custom' => []
    ]
];
