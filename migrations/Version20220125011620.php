<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220125011620 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lunch ADD starter_id INT DEFAULT NULL, ADD dish_id INT DEFAULT NULL, ADD dessert_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE lunch ADD CONSTRAINT FK_89F10ADBAD5A66CC FOREIGN KEY (starter_id) REFERENCES starter (id)');
        $this->addSql('ALTER TABLE lunch ADD CONSTRAINT FK_89F10ADB148EB0CB FOREIGN KEY (dish_id) REFERENCES dish (id)');
        $this->addSql('ALTER TABLE lunch ADD CONSTRAINT FK_89F10ADB745B52FD FOREIGN KEY (dessert_id) REFERENCES dessert (id)');
        $this->addSql('CREATE INDEX IDX_89F10ADBAD5A66CC ON lunch (starter_id)');
        $this->addSql('CREATE INDEX IDX_89F10ADB148EB0CB ON lunch (dish_id)');
        $this->addSql('CREATE INDEX IDX_89F10ADB745B52FD ON lunch (dessert_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lunch DROP FOREIGN KEY FK_89F10ADBAD5A66CC');
        $this->addSql('ALTER TABLE lunch DROP FOREIGN KEY FK_89F10ADB148EB0CB');
        $this->addSql('ALTER TABLE lunch DROP FOREIGN KEY FK_89F10ADB745B52FD');
        $this->addSql('DROP INDEX IDX_89F10ADBAD5A66CC ON lunch');
        $this->addSql('DROP INDEX IDX_89F10ADB148EB0CB ON lunch');
        $this->addSql('DROP INDEX IDX_89F10ADB745B52FD ON lunch');
        $this->addSql('ALTER TABLE lunch DROP starter_id, DROP dish_id, DROP dessert_id');
    }
}
