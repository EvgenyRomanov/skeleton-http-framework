<?php

declare(strict_types=1);

namespace App\Infrastructure\Job;

use App\Infrastructure\TestService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

final class ExampleJob2 implements ShouldQueue
{
    use Queueable;
    use InteractsWithQueue;
    use SerializesModels;

    /**
    * Количество попыток выполнения задания.
    *
    * @var int
    */
    public $tries = 5;

    private array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function handle(TestService $testService): void
    {
        dump($this->data);
        dump($testService->handle());
    }
}
