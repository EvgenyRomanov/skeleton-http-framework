<?php

declare(strict_types=1);

namespace App\Infrastructure\ConsoleCommands\Timers;

use App\Infrastructure\ConsoleCommands\CommandHelper;
use Symfony\Component\Cache\Adapter\PdoAdapter as Cache;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'cache:invalidate', description: 'Инвалидация кэша')]
final class InvalidateCache extends Command
{
    public function __construct(private readonly Cache $cache)
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        return CommandHelper::execute(function () use ($input, $output): void {
            $this->cache->prune();
        }, $input, $output);
    }
}
