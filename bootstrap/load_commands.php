<?php

use Laminas\ConfigAggregator\ConfigAggregator;
use Symfony\Component\Console\Application;
use Illuminate\Container\Container;
use Symfony\Component\Console\Command\LazyCommand;
use Symfony\Component\Console\Command\Command;

function wrapLazyCommand(Container $container, $className): LazyCommand
{
    return new LazyCommand(
        $className::getDefaultName(),
        [],
        $className::getDefaultDescription(),
        false,
        static fn (): Command => $container[$className],
    );
}

return static function (Container $container, Application $app): void {
    /** @var ConfigAggregator $configAggregator */
    $configAggregator = $container[ConfigAggregator::class];
    $config = $configAggregator->getMergedConfig();

    $vendorCommands = $config['console_commands']['vendors'];

    foreach ($vendorCommands as $command) {
        $app->add($container[$command]);
    }

    $lazyCommands = $config['console_commands']['lazy'];

    foreach ($lazyCommands as $command) {
        $app->add(wrapLazyCommand($container, $command));
    }
};
