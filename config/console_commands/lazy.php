<?php

return [
    'console_commands' => [
        'lazy' => [
            \App\Infrastructure\ConsoleCommand\Test\TestCommand::class,
            \App\Infrastructure\ConsoleCommand\ClearFailedJobs::class,
            \App\Infrastructure\ConsoleCommand\CountJobs::class,
            \App\Infrastructure\ConsoleCommand\RestartingFailedJobs::class,
            \App\Infrastructure\ConsoleCommand\RunWorker::class,
            \App\Infrastructure\ConsoleCommand\Timer\InvalidateCache::class,
            \App\Infrastructure\ConsoleCommand\Test\TestCommand::class,
            \App\Infrastructure\ConsoleCommand\Test\Cache\TestCacheCommand::class,
            \App\Infrastructure\ConsoleCommand\Test\Event\GenerateEvent::class,
            \App\Infrastructure\ConsoleCommand\Test\Job\QueuePush::class,
        ]
    ]
];
