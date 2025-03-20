<?php

return [
    'partner_code' => env('MOMO_PARTNER_CODE'),
    'access_key' => env('MOMO_ACCESS_KEY'),
    'secret_key' => env('MOMO_SECRET_KEY'),
    'return_url' => env('MOMO_RETURN_URL'),
    'notify_url' => env('MOMO_NOTIFY_URL'),
    'mode' => env('MOMO_MODE', 'development'),
];
