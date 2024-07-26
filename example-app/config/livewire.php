<?php

return [
    'middleware' => [
        'web' => \Livewire\Middleware\AuthenticateSession::class,
    ],
    'ui' => [
        'theme' => 'default',
    ],
];
