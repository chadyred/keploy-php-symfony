<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241121081744 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create the book entity table';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE book (id SERIAL NOT NULL, title VARCHAR(255) NOT NULL, author VARCHAR(255) NOT NULL, print_length INT NOT NULL, PRIMARY KEY(id))');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE book');
    }
}
