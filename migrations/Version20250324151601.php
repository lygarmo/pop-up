<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250324151601 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE autores ADD editorial_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE autores ADD CONSTRAINT FK_2A6A65DBAF1A24D FOREIGN KEY (editorial_id) REFERENCES editorial (id)');
        $this->addSql('CREATE INDEX IDX_2A6A65DBAF1A24D ON autores (editorial_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE autores DROP FOREIGN KEY FK_2A6A65DBAF1A24D');
        $this->addSql('DROP INDEX IDX_2A6A65DBAF1A24D ON autores');
        $this->addSql('ALTER TABLE autores DROP editorial_id');
    }
}
