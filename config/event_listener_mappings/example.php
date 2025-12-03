<?php

return [
    'event_listener_mapping' => [
        \App\Infrastructure\Events\ExampleEvent::class => [
            \App\Infrastructure\Listeners\ExampleEventListener::class,
            \App\Infrastructure\Listeners\ExampleEventListener2::class,
        ],
    ]
];
