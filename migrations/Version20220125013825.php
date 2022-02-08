<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220125013825 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE lunch_starter (lunch_id INT NOT NULL, starter_id INT NOT NULL, INDEX IDX_A935EFADD7C83568 (lunch_id), INDEX IDX_A935EFADAD5A66CC (starter_id), PRIMARY KEY(lunch_id, starter_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lunch_dessert (lunch_id INT NOT NULL, dessert_id INT NOT NULL, INDEX IDX_905ED7B0D7C83568 (lunch_id), INDEX IDX_905ED7B0745B52FD (dessert_id), PRIMARY KEY(lunch_id, dessert_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lunch_dish (lunch_id INT NOT NULL, dish_id INT NOT NULL, INDEX IDX_787686AD7C83568 (lunch_id), INDEX IDX_787686A148EB0CB (dish_id), PRIMARY KEY(lunch_id, dish_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE lunch_starter ADD CONSTRAINT FK_A935EFADD7C83568 FOREIGN KEY (lunch_id) REFERENCES lunch (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lunch_starter ADD CONSTRAINT FK_A935EFADAD5A66CC FOREIGN KEY (starter_id) REFERENCES starter (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lunch_dessert ADD CONSTRAINT FK_905ED7B0D7C83568 FOREIGN KEY (lunch_id) REFERENCES lunch (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lunch_dessert ADD CONSTRAINT FK_905ED7B0745B52FD FOREIGN KEY (dessert_id) REFERENCES dessert (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lunch_dish ADD CONSTRAINT FK_787686AD7C83568 FOREIGN KEY (lunch_id) REFERENCES lunch (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lunch_dish ADD CONSTRAINT FK_787686A148EB0CB FOREIGN KEY (dish_id) REFERENCES dish (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dish DROP FOREIGN KEY FK_957D8CB8C54C8C93');
        $this->addSql('DROP INDEX IDX_957D8CB8C54C8C93 ON dish');
        $this->addSql('ALTER TABLE dish DROP type_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE lunch_starter');
        $this->addSql('DROP TABLE lunch_dessert');
        $this->addSql('DROP TABLE lunch_dish');
        $this->addSql('ALTER TABLE dish ADD type_id INT NOT NULL');
        $this->addSql('ALTER TABLE dish ADD CONSTRAINT FK_957D8CB8C54C8C93 FOREIGN KEY (type_id) REFERENCES dish_type (id)');
        $this->addSql('CREATE INDEX IDX_957D8CB8C54C8C93 ON dish (type_id)');
    }
}
