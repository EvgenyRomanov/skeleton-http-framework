<?php

use Illuminate\Container\Container;
use Doctrine\Migrations\Tools\Console\Command;
use Doctrine\Migrations\DependencyFactory;
use Doctrine\Migrations\Configuration\Migration\ConfigurationArray;
use Doctrine\Migrations\Configuration\Connection\ExistingConnection;
use Laminas\ConfigAggregator\ConfigAggregator;
use Doctrine\DBAL\DriverManager;

return static function (Container $container): void {

    $container->singleton(DependencyFactory::class, function (Container $container) {
        /** @var ConfigAggregator $configAggregator */
        $configAggregator = $container[ConfigAggregator::class];
        $config = $configAggregator->getMergedConfig();

        return DependencyFactory::fromConnection(
            new ConfigurationArray($config['migrations']),
            new ExistingConnection(DriverManager::getConnection([
                'dbname' => $config['db']['database'],
                'user' => $config['db']['username'],
                'password' => $config['db']['password'],
                'host' => $config['db']['host'],
                'driver' => $config['db']['driver'],
                'charset' => 'utf8',
                'port' => $config['db']['port'],
                'schema' => 'public',
            ]))
        );
    });

    $container->singleton(Command\DumpSchemaCommand::class, function (Container $container) {
        return new Command\DumpSchemaCommand($container[DependencyFactory::class]);
    });

    $container->singleton(Command\ExecuteCommand::class, function (Container $container) {
        return new Command\ExecuteCommand($container[DependencyFactory::class]);
    });

    $container->singleton(Command\GenerateCommand::class, function (Container $container) {
        return new Command\GenerateCommand($container[DependencyFactory::class]);
    });

    $container->singleton(Command\LatestCommand::class, function (Container $container) {
        return new Command\LatestCommand($container[DependencyFactory::class]);
    });

    $container->singleton(Command\ListCommand::class, function (Container $container) {
        return new Command\ListCommand($container[DependencyFactory::class]);
    });

    $container->singleton(Command\MigrateCommand::class, function (Container $container) {
        return new Command\MigrateCommand($container[DependencyFactory::class]);
    });

    $container->singleton(Command\RollupCommand::class, function (Container $container) {
        return new Command\RollupCommand($container[DependencyFactory::class]);
    });

    $container->singleton(Command\StatusCommand::class, function (Container $container) {
        return new Command\StatusCommand($container[DependencyFactory::class]);
    });

    $container->singleton(Command\SyncMetadataCommand::class, function (Container $container) {
        return new Command\SyncMetadataCommand($container[DependencyFactory::class]);
    });

    $container->singleton(Command\VersionCommand::class, function (Container $container) {
        return new Command\VersionCommand($container[DependencyFactory::class]);
    });
};
