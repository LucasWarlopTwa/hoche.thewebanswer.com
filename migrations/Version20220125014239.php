<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220125014239 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE dinner_starter (dinner_id INT NOT NULL, starter_id INT NOT NULL, INDEX IDX_B6DE9293C8B1AA0C (dinner_id), INDEX IDX_B6DE9293AD5A66CC (starter_id), PRIMARY KEY(dinner_id, starter_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dinner_dish (dinner_id INT NOT NULL, dish_id INT NOT NULL, INDEX IDX_66A65765C8B1AA0C (dinner_id), INDEX IDX_66A65765148EB0CB (dish_id), PRIMARY KEY(dinner_id, dish_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dinner_dessert (dinner_id INT NOT NULL, dessert_id INT NOT NULL, INDEX IDX_8FB5AA8EC8B1AA0C (dinner_id), INDEX IDX_8FB5AA8E745B52FD (dessert_id), PRIMARY KEY(dinner_id, dessert_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE dinner_starter ADD CONSTRAINT FK_B6DE9293C8B1AA0C FOREIGN KEY (dinner_id) REFERENCES dinner (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dinner_starter ADD CONSTRAINT FK_B6DE9293AD5A66CC FOREIGN KEY (starter_id) REFERENCES starter (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dinner_dish ADD CONSTRAINT FK_66A65765C8B1AA0C FOREIGN KEY (dinner_id) REFERENCES dinner (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dinner_dish ADD CONSTRAINT FK_66A65765148EB0CB FOREIGN KEY (dish_id) REFERENCES dish (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dinner_dessert ADD CONSTRAINT FK_8FB5AA8EC8B1AA0C FOREIGN KEY (dinner_id) REFERENCES dinner (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dinner_dessert ADD CONSTRAINT FK_8FB5AA8E745B52FD FOREIGN KEY (dessert_id) REFERENCES dessert (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE dinner_starter');
        $this->addSql('DROP TABLE dinner_dish');
        $this->addSql('DROP TABLE dinner_dessert');
    }
}
