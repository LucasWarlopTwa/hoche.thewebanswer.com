<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230510144605 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE day DROP FOREIGN KEY FK_E5A029904A9AE842');
        $this->addSql('ALTER TABLE day DROP FOREIGN KEY FK_E5A0299063AC8895');
        $this->addSql('DROP INDEX IDX_E5A0299063AC8895 ON day');
        $this->addSql('DROP INDEX IDX_E5A029904A9AE842 ON day');
        $this->addSql('ALTER TABLE day ADD lunch_id INT DEFAULT NULL, ADD dinner_id INT DEFAULT NULL, DROP lunch_of_the_day_id, DROP dinner_of_the_day_id');
        $this->addSql('ALTER TABLE day ADD CONSTRAINT FK_E5A02990D7C83568 FOREIGN KEY (lunch_id) REFERENCES lunch (id)');
        $this->addSql('ALTER TABLE day ADD CONSTRAINT FK_E5A02990C8B1AA0C FOREIGN KEY (dinner_id) REFERENCES dinner (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E5A02990D7C83568 ON day (lunch_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E5A02990C8B1AA0C ON day (dinner_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE day DROP FOREIGN KEY FK_E5A02990D7C83568');
        $this->addSql('ALTER TABLE day DROP FOREIGN KEY FK_E5A02990C8B1AA0C');
        $this->addSql('DROP INDEX UNIQ_E5A02990D7C83568 ON day');
        $this->addSql('DROP INDEX UNIQ_E5A02990C8B1AA0C ON day');
        $this->addSql('ALTER TABLE day ADD lunch_of_the_day_id INT DEFAULT NULL, ADD dinner_of_the_day_id INT DEFAULT NULL, DROP lunch_id, DROP dinner_id');
        $this->addSql('ALTER TABLE day ADD CONSTRAINT FK_E5A029904A9AE842 FOREIGN KEY (lunch_of_the_day_id) REFERENCES lunch (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE day ADD CONSTRAINT FK_E5A0299063AC8895 FOREIGN KEY (dinner_of_the_day_id) REFERENCES dinner (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_E5A0299063AC8895 ON day (dinner_of_the_day_id)');
        $this->addSql('CREATE INDEX IDX_E5A029904A9AE842 ON day (lunch_of_the_day_id)');
    }
}
