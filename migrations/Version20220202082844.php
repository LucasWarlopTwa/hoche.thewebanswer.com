<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220202082844 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE accompagnement (id INT AUTO_INCREMENT NOT NULL, category_id INT DEFAULT NULL, type_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_2130A05B12469DE2 (category_id), INDEX IDX_2130A05BC54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE accompagnement_lunch (accompagnement_id INT NOT NULL, lunch_id INT NOT NULL, INDEX IDX_DC0355938E768805 (accompagnement_id), INDEX IDX_DC035593D7C83568 (lunch_id), PRIMARY KEY(accompagnement_id, lunch_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE accompagnement_dinner (accompagnement_id INT NOT NULL, dinner_id INT NOT NULL, INDEX IDX_F1E62BC68E768805 (accompagnement_id), INDEX IDX_F1E62BC6C8B1AA0C (dinner_id), PRIMARY KEY(accompagnement_id, dinner_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE accompagnement ADD CONSTRAINT FK_2130A05B12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE accompagnement ADD CONSTRAINT FK_2130A05BC54C8C93 FOREIGN KEY (type_id) REFERENCES dish_type (id)');
        $this->addSql('ALTER TABLE accompagnement_lunch ADD CONSTRAINT FK_DC0355938E768805 FOREIGN KEY (accompagnement_id) REFERENCES accompagnement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE accompagnement_lunch ADD CONSTRAINT FK_DC035593D7C83568 FOREIGN KEY (lunch_id) REFERENCES lunch (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE accompagnement_dinner ADD CONSTRAINT FK_F1E62BC68E768805 FOREIGN KEY (accompagnement_id) REFERENCES accompagnement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE accompagnement_dinner ADD CONSTRAINT FK_F1E62BC6C8B1AA0C FOREIGN KEY (dinner_id) REFERENCES dinner (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE accompagnement_lunch DROP FOREIGN KEY FK_DC0355938E768805');
        $this->addSql('ALTER TABLE accompagnement_dinner DROP FOREIGN KEY FK_F1E62BC68E768805');
        $this->addSql('DROP TABLE accompagnement');
        $this->addSql('DROP TABLE accompagnement_lunch');
        $this->addSql('DROP TABLE accompagnement_dinner');
    }
}
