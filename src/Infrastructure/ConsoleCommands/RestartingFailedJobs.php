<?php

declare(strict_types=1);

namespace App\Infrastructure\ConsoleCommands;

use Illuminate\Database\Capsule\Manager as Capsule;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/** @psalm-suppress UnusedClass */
#[AsCommand(name: 'queue:restarting_failed_jobs', description: 'Перезапуск failed jobs')]
final class RestartingFailedJobs extends Command
{
    public function __construct(
        private readonly Capsule $capsule,
        private readonly \Illuminate\Queue\Capsule\Manager $manager
    ) {
        parent::__construct();
    }

    #[\Override]
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        return CommandHelper::execute(function (): void {
            $table = 'illuminate_failed_jobs';
            $failedJobs = $this->capsule::table($table)->get();

            foreach ($failedJobs as $failedJob) {
                // Отправляем задачу обратно в очередь
                $this->manager->pushRaw($failedJob->payload, $failedJob->queue);

                // Удаляем задачу из таблицы failed_jobs
                $this->capsule::table($table)->where('id', $failedJob->id)->delete();
            }
        }, $input, $output);
    }
}
