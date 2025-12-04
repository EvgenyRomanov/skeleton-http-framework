<?php

declare(strict_types=1);

namespace App\Infrastructure\Jobs;

use App\Infrastructure\TestService;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Throwable;

/**
 * @psalm-suppress PossiblyUnusedProperty
 * @psalm-suppress UnusedProperty
 */
final class ExampleJob3 implements ShouldQueue
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

    /** @psalm-suppress PossiblyUnusedMethod */
    public function handle(TestService $testService): void
    {
        dump($testService->handle());
        throw new Exception('Test 12345');
    }

    /**
     * Обработать провал задания.
     * @psalm-suppress PossiblyUnusedMethod
     */
    public function failed(Throwable $exception): void
    {
        dump('выброс исключения: ' . $exception->getMessage());
    }
}
