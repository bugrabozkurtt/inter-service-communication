<?php

return [
    'base_uri' => env('SERVICE_BASE_URI', 'http://localhost'),
    'timeout' => env('SERVICE_TIMEOUT', 5),
    'headers' => [
        'Accept' => 'application/json',
    ],
];
