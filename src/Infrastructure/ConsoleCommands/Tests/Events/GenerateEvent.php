<?php

declare(strict_types=1);

namespace App\Infrastructure\ConsoleCommands\Tests\Events;

use App\Infrastructure\ConsoleCommands\CommandHelper;
use App\Infrastructure\Events\ExampleEvent;
use Override;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/** @psalm-suppress UnusedClass */
#[AsCommand(name: 'events:generate', description: 'Консольная команда для тестов')]
final class GenerateEvent extends Command
{
    public function __construct(
        private readonly \Illuminate\Contracts\Events\Dispatcher $dispatcher
    ) {
        parent::__construct();
    }

    #[Override]
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        return CommandHelper::execute(function (): void {
            $this->dispatcher->dispatch(new ExampleEvent('1q2w3e'));
        }, $input, $output);
    }
}
