<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220124232403 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dish ADD type_id INT NOT NULL');
        $this->addSql('ALTER TABLE dish ADD CONSTRAINT FK_957D8CB8C54C8C93 FOREIGN KEY (type_id) REFERENCES dish_type (id)');
        $this->addSql('CREATE INDEX IDX_957D8CB8C54C8C93 ON dish (type_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dish DROP FOREIGN KEY FK_957D8CB8C54C8C93');
        $this->addSql('DROP INDEX IDX_957D8CB8C54C8C93 ON dish');
        $this->addSql('ALTER TABLE dish DROP type_id');
    }
}
