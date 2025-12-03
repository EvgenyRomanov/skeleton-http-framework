<?php

return [
    'console_commands' => [
        'vendors' => [
            \Doctrine\Migrations\Tools\Console\Command\DumpSchemaCommand::class,
            \Doctrine\Migrations\Tools\Console\Command\ExecuteCommand::class,
            \Doctrine\Migrations\Tools\Console\Command\GenerateCommand::class,
            \Doctrine\Migrations\Tools\Console\Command\LatestCommand::class,
            \Doctrine\Migrations\Tools\Console\Command\ListCommand::class,
            \Doctrine\Migrations\Tools\Console\Command\MigrateCommand::class,
            \Doctrine\Migrations\Tools\Console\Command\RollupCommand::class,
            \Doctrine\Migrations\Tools\Console\Command\StatusCommand::class,
            \Doctrine\Migrations\Tools\Console\Command\SyncMetadataCommand::class,
            \Doctrine\Migrations\Tools\Console\Command\VersionCommand::class,
        ]
    ]
];
