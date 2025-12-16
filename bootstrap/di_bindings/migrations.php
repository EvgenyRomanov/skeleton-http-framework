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
        /** @var array{
         *     migrations: array<string, mixed>,
         *     db: array{database: string, username: string, password: string, host: string, driver: string, port: int}
         *     } $config
         */
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

    /** @var DependencyFactory $depFactory */
    $depFactory = $container[DependencyFactory::class];

    $container->singleton(Command\DumpSchemaCommand::class, function () use ($depFactory) {
        return new Command\DumpSchemaCommand($depFactory);
    });

    $container->singleton(Command\ExecuteCommand::class, function () use ($depFactory) {
        return new Command\ExecuteCommand($depFactory);
    });

    $container->singleton(Command\GenerateCommand::class, function () use ($depFactory) {
        return new Command\GenerateCommand($depFactory);
    });

    $container->singleton(Command\LatestCommand::class, function () use ($depFactory) {
        return new Command\LatestCommand($depFactory);
    });

    $container->singleton(Command\ListCommand::class, function () use ($depFactory) {
        return new Command\ListCommand($depFactory);
    });

    $container->singleton(Command\MigrateCommand::class, function () use ($depFactory) {
        return new Command\MigrateCommand($depFactory);
    });

    $container->singleton(Command\RollupCommand::class, function () use ($depFactory) {
        return new Command\RollupCommand($depFactory);
    });

    $container->singleton(Command\StatusCommand::class, function () use ($depFactory) {
        return new Command\StatusCommand($depFactory);
    });

    $container->singleton(Command\SyncMetadataCommand::class, function () use ($depFactory) {
        return new Command\SyncMetadataCommand($depFactory);
    });

    $container->singleton(Command\VersionCommand::class, function () use ($depFactory) {
        return new Command\VersionCommand($depFactory);
    });
};
