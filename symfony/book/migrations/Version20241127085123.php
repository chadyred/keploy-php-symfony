<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241127085123 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create library migration';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE library (id SERIAL NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE book ADD library_id INT NOT NULL');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT FK_CBE5A331FE2541D7 FOREIGN KEY (library_id) REFERENCES library (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_CBE5A331FE2541D7 ON book (library_id)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE book DROP CONSTRAINT FK_CBE5A331FE2541D7');
        $this->addSql('DROP TABLE library');
        $this->addSql('DROP INDEX IDX_CBE5A331FE2541D7');
        $this->addSql('ALTER TABLE book DROP library_id');
    }
}
