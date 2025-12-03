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

    public function handle(TestService $testService): void
    {
        throw new Exception('Test 12345');
    }

    /**
    * Обработать провал задания.
    * @return void
    */
    public function failed(Throwable $exception): void
    {
        dump('выброс исключения: ' . $exception->getMessage());
    }
}
