<?php

declare(strict_types=1);

namespace App\Infrastructure\ConsoleCommand\Test;

use App\Infrastructure\ConsoleCommand\CommandHelper;
use App\Infrastructure\Model\User;
use Override;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/** @psalm-suppress UnusedClass */
#[AsCommand(name: 'test:test', description: 'Test command')]
final class TestCommand extends Command
{
    #[Override]
    protected function configure(): void
    {
        $this->addArgument('test');
    }

    #[Override]
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        return CommandHelper::execute(static function (): void {
            dump(User::all());
        }, $input, $output);
    }
}
