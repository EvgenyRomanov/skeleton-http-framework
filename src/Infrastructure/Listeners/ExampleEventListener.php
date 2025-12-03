<?php

declare(strict_types=1);

namespace App\Infrastructure\Listeners;

use App\Infrastructure\Events\ExampleEvent;

final class ExampleEventListener
{
    public function handle(ExampleEvent $event): void
    {
        dump($event);
    }
}
