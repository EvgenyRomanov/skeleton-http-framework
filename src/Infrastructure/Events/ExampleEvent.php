<?php

declare(strict_types=1);

namespace App\Infrastructure\Events;

final class ExampleEvent
{
    public string $payload;

    public function __construct(string $payload)
    {
        $this->payload = $payload;
    }
}
