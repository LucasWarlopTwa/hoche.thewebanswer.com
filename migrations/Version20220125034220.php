<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220125034220 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE dessert_category (dessert_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_C6DA6A2E745B52FD (dessert_id), INDEX IDX_C6DA6A2E12469DE2 (category_id), PRIMARY KEY(dessert_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dish_category (dish_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_1FB098AA148EB0CB (dish_id), INDEX IDX_1FB098AA12469DE2 (category_id), PRIMARY KEY(dish_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE starter_category (starter_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_67B9C9BAAD5A66CC (starter_id), INDEX IDX_67B9C9BA12469DE2 (category_id), PRIMARY KEY(starter_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE dessert_category ADD CONSTRAINT FK_C6DA6A2E745B52FD FOREIGN KEY (dessert_id) REFERENCES dessert (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dessert_category ADD CONSTRAINT FK_C6DA6A2E12469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dish_category ADD CONSTRAINT FK_1FB098AA148EB0CB FOREIGN KEY (dish_id) REFERENCES dish (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dish_category ADD CONSTRAINT FK_1FB098AA12469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE starter_category ADD CONSTRAINT FK_67B9C9BAAD5A66CC FOREIGN KEY (starter_id) REFERENCES starter (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE starter_category ADD CONSTRAINT FK_67B9C9BA12469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE dessert_category');
        $this->addSql('DROP TABLE dish_category');
        $this->addSql('DROP TABLE starter_category');
    }
}
