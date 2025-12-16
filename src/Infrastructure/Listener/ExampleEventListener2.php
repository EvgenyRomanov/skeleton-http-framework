<?php

declare(strict_types=1);

namespace App\Infrastructure\Listener;

use App\Infrastructure\Event\ExampleEvent;

/** @psalm-suppress UnusedClass */
final class ExampleEventListener2
{
    public function handle(ExampleEvent $event): void
    {
        dump($event->payload . " Qwerty");
    }
}
