<?php

declare(strict_types=1);

namespace App\Infrastructure\ConsoleCommands;

use Illuminate\Database\Capsule\Manager as Capsule;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'queue:clear_failed_jobs', description: 'Очистка failed jobs')]
final class ClearFailedJobs extends Command
{
    public function __construct(private readonly Capsule $capsule)
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        return CommandHelper::execute(function () use ($input, $output): void {
            $this->capsule::table('illuminate_failed_jobs')->truncate();
        }, $input, $output);
    }
}
