<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230510052422 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE day DROP FOREIGN KEY FK_E5A02990C86F3B2F');
        $this->addSql('DROP TABLE week');
        $this->addSql('DROP INDEX IDX_E5A02990C86F3B2F ON day');
        $this->addSql('ALTER TABLE day DROP week_id');
        $this->addSql('ALTER TABLE dinner DROP name');
        $this->addSql('ALTER TABLE lunch DROP name');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE week (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, actual TINYINT(1) NOT NULL, slug VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE lunch ADD name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE day ADD week_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE day ADD CONSTRAINT FK_E5A02990C86F3B2F FOREIGN KEY (week_id) REFERENCES week (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_E5A02990C86F3B2F ON day (week_id)');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT NOT NULL COLLATE `utf8mb4_bin`');
        $this->addSql('ALTER TABLE dinner ADD name VARCHAR(255) NOT NULL');
    }
}
