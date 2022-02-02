<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220202093110 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE dinner_laitier (dinner_id INT NOT NULL, laitier_id INT NOT NULL, INDEX IDX_75B6C9A2C8B1AA0C (dinner_id), INDEX IDX_75B6C9A292D5845D (laitier_id), PRIMARY KEY(dinner_id, laitier_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE laitier (id INT AUTO_INCREMENT NOT NULL, type_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_832A78BAC54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE laitier_category (laitier_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_799A9C2392D5845D (laitier_id), INDEX IDX_799A9C2312469DE2 (category_id), PRIMARY KEY(laitier_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lunch_laitier (lunch_id INT NOT NULL, laitier_id INT NOT NULL, INDEX IDX_6A5DB49CD7C83568 (lunch_id), INDEX IDX_6A5DB49C92D5845D (laitier_id), PRIMARY KEY(lunch_id, laitier_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE dinner_laitier ADD CONSTRAINT FK_75B6C9A2C8B1AA0C FOREIGN KEY (dinner_id) REFERENCES dinner (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dinner_laitier ADD CONSTRAINT FK_75B6C9A292D5845D FOREIGN KEY (laitier_id) REFERENCES laitier (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE laitier ADD CONSTRAINT FK_832A78BAC54C8C93 FOREIGN KEY (type_id) REFERENCES dish_type (id)');
        $this->addSql('ALTER TABLE laitier_category ADD CONSTRAINT FK_799A9C2392D5845D FOREIGN KEY (laitier_id) REFERENCES laitier (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE laitier_category ADD CONSTRAINT FK_799A9C2312469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lunch_laitier ADD CONSTRAINT FK_6A5DB49CD7C83568 FOREIGN KEY (lunch_id) REFERENCES lunch (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lunch_laitier ADD CONSTRAINT FK_6A5DB49C92D5845D FOREIGN KEY (laitier_id) REFERENCES laitier (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dinner_laitier DROP FOREIGN KEY FK_75B6C9A292D5845D');
        $this->addSql('ALTER TABLE laitier_category DROP FOREIGN KEY FK_799A9C2392D5845D');
        $this->addSql('ALTER TABLE lunch_laitier DROP FOREIGN KEY FK_6A5DB49C92D5845D');
        $this->addSql('DROP TABLE dinner_laitier');
        $this->addSql('DROP TABLE laitier');
        $this->addSql('DROP TABLE laitier_category');
        $this->addSql('DROP TABLE lunch_laitier');
    }
}
