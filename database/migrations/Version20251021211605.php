<?php

declare(strict_types=1);

namespace App\Database\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251021211605 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $table = $schema->createTable('users');
        $table->addColumn('id', 'bigint', ['autoincrement' => true]);
        $table->addColumn('email', 'string');
        $table->addColumn('password', 'string');
        $table->addColumn('first_name', 'string', ['notnull' => false]);
        $table->addColumn('last_name', 'string', ['notnull' => false]);
        $table->addColumn('created_at', 'datetime', ['notnull' => false]);
        $table->addColumn('updated_at', 'datetime', ['notnull' => false]);

        $table->addUniqueIndex(['email']);
    }

    public function down(Schema $schema): void
    {
        $schema->dropTable('users');
    }
}
