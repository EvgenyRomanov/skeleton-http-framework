<?php

return [
    'event_listener_mapping' => [
        \App\Infrastructure\Event\ExampleEvent::class => [
            \App\Infrastructure\Listener\ExampleEventListener::class,
            \App\Infrastructure\Listener\ExampleEventListener2::class,
        ],
    ]
];
