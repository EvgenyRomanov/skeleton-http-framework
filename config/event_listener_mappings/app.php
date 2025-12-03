<?php

return [
    'event_listener_mapping' => [
        \Illuminate\Queue\Events\JobFailed::class => [
            \App\Infrastructure\Listeners\JobFailedListener::class
        ],

        \Illuminate\Queue\Events\JobProcessed::class => [
            \App\Infrastructure\Listeners\JobProcessedListener::class
        ],

        \Illuminate\Queue\Events\JobProcessing::class => [
            \App\Infrastructure\Listeners\JobProcessingListener::class
        ],
    ]
];
