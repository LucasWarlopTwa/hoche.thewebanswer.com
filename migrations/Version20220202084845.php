<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220202084845 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE accompagnement_category (accompagnement_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_165517478E768805 (accompagnement_id), INDEX IDX_1655174712469DE2 (category_id), PRIMARY KEY(accompagnement_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dinner_accompagnement (dinner_id INT NOT NULL, accompagnement_id INT NOT NULL, INDEX IDX_136C3148C8B1AA0C (dinner_id), INDEX IDX_136C31488E768805 (accompagnement_id), PRIMARY KEY(dinner_id, accompagnement_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lunch_accompagnement (lunch_id INT NOT NULL, accompagnement_id INT NOT NULL, INDEX IDX_BF2405FD7C83568 (lunch_id), INDEX IDX_BF2405F8E768805 (accompagnement_id), PRIMARY KEY(lunch_id, accompagnement_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE accompagnement_category ADD CONSTRAINT FK_165517478E768805 FOREIGN KEY (accompagnement_id) REFERENCES accompagnement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE accompagnement_category ADD CONSTRAINT FK_1655174712469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dinner_accompagnement ADD CONSTRAINT FK_136C3148C8B1AA0C FOREIGN KEY (dinner_id) REFERENCES dinner (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dinner_accompagnement ADD CONSTRAINT FK_136C31488E768805 FOREIGN KEY (accompagnement_id) REFERENCES accompagnement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lunch_accompagnement ADD CONSTRAINT FK_BF2405FD7C83568 FOREIGN KEY (lunch_id) REFERENCES lunch (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lunch_accompagnement ADD CONSTRAINT FK_BF2405F8E768805 FOREIGN KEY (accompagnement_id) REFERENCES accompagnement (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE accompagnement_dinner');
        $this->addSql('DROP TABLE accompagnement_lunch');
        $this->addSql('ALTER TABLE accompagnement DROP FOREIGN KEY FK_2130A05B12469DE2');
        $this->addSql('DROP INDEX IDX_2130A05B12469DE2 ON accompagnement');
        $this->addSql('ALTER TABLE accompagnement DROP category_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE accompagnement_dinner (accompagnement_id INT NOT NULL, dinner_id INT NOT NULL, INDEX IDX_F1E62BC68E768805 (accompagnement_id), INDEX IDX_F1E62BC6C8B1AA0C (dinner_id), PRIMARY KEY(accompagnement_id, dinner_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE accompagnement_lunch (accompagnement_id INT NOT NULL, lunch_id INT NOT NULL, INDEX IDX_DC0355938E768805 (accompagnement_id), INDEX IDX_DC035593D7C83568 (lunch_id), PRIMARY KEY(accompagnement_id, lunch_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE accompagnement_dinner ADD CONSTRAINT FK_F1E62BC68E768805 FOREIGN KEY (accompagnement_id) REFERENCES accompagnement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE accompagnement_dinner ADD CONSTRAINT FK_F1E62BC6C8B1AA0C FOREIGN KEY (dinner_id) REFERENCES dinner (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE accompagnement_lunch ADD CONSTRAINT FK_DC0355938E768805 FOREIGN KEY (accompagnement_id) REFERENCES accompagnement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE accompagnement_lunch ADD CONSTRAINT FK_DC035593D7C83568 FOREIGN KEY (lunch_id) REFERENCES lunch (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE accompagnement_category');
        $this->addSql('DROP TABLE dinner_accompagnement');
        $this->addSql('DROP TABLE lunch_accompagnement');
        $this->addSql('ALTER TABLE accompagnement ADD category_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE accompagnement ADD CONSTRAINT FK_2130A05B12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_2130A05B12469DE2 ON accompagnement (category_id)');
    }
}
