<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220125012600 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lunch DROP FOREIGN KEY FK_89F10ADBAD5A66CC');
        $this->addSql('DROP INDEX IDX_89F10ADBAD5A66CC ON lunch');
        $this->addSql('ALTER TABLE lunch DROP starter_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lunch ADD starter_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE lunch ADD CONSTRAINT FK_89F10ADBAD5A66CC FOREIGN KEY (starter_id) REFERENCES starter (id)');
        $this->addSql('CREATE INDEX IDX_89F10ADBAD5A66CC ON lunch (starter_id)');
    }
}
