<?php

return [
    'providers' => [
        Ichtrojan\Otp\OtpServiceProvider::class,
    ],

    'aliases' => [
        'Otp' => Ichtrojan\Otp\Facades\Otp::class,
    ],
];
