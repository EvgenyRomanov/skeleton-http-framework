<?php

return [
    'console_commands' => [
        'lazy' => [
            \App\Infrastructure\ConsoleCommands\Tests\TestCommand::class,
            \App\Infrastructure\ConsoleCommands\ClearFailedJobs::class,
            \App\Infrastructure\ConsoleCommands\CountJobs::class,
            \App\Infrastructure\ConsoleCommands\RestartingFailedJobs::class,
            \App\Infrastructure\ConsoleCommands\RunWorker::class,
            \App\Infrastructure\ConsoleCommands\Timers\InvalidateCache::class,
            \App\Infrastructure\ConsoleCommands\Tests\TestCommand::class,
            \App\Infrastructure\ConsoleCommands\Tests\Cache\TestCacheCommand::class,
            \App\Infrastructure\ConsoleCommands\Tests\Events\GenerateEvent::class,
            \App\Infrastructure\ConsoleCommands\Tests\Jobs\QueuePush::class,
        ]
    ]
];
