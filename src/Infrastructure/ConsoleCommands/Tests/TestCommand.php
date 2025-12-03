<?php

declare(strict_types=1);

namespace App\Infrastructure\ConsoleCommands\Tests;

use App\Infrastructure\ConsoleCommands\CommandHelper;
use App\Infrastructure\Models\User;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'test:test', description: 'Test command')]
final class TestCommand extends Command
{
    protected function configure(): void
    {
        $this->addArgument('test');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        return CommandHelper::execute(static function () use ($input, $output): void {
            dump(User::all());
        }, $input, $output);
    }
}
