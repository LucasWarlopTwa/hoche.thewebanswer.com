<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220125011006 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE day ADD dinner_of_the_day_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE day ADD CONSTRAINT FK_E5A0299063AC8895 FOREIGN KEY (dinner_of_the_day_id) REFERENCES dinner (id)');
        $this->addSql('CREATE INDEX IDX_E5A0299063AC8895 ON day (dinner_of_the_day_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE day DROP FOREIGN KEY FK_E5A0299063AC8895');
        $this->addSql('DROP INDEX IDX_E5A0299063AC8895 ON day');
        $this->addSql('ALTER TABLE day DROP dinner_of_the_day_id');
    }
}
