<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230508141910 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE accompagnement (id INT AUTO_INCREMENT NOT NULL, type_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_2130A05BC54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE accompagnement_category (accompagnement_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_165517478E768805 (accompagnement_id), INDEX IDX_1655174712469DE2 (category_id), PRIMARY KEY(accompagnement_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, icon VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE day (id INT AUTO_INCREMENT NOT NULL, lunch_of_the_day_id INT DEFAULT NULL, dinner_of_the_day_id INT DEFAULT NULL, week_id INT DEFAULT NULL, date_of_service DATE NOT NULL, INDEX IDX_E5A029904A9AE842 (lunch_of_the_day_id), INDEX IDX_E5A0299063AC8895 (dinner_of_the_day_id), INDEX IDX_E5A02990C86F3B2F (week_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dessert (id INT AUTO_INCREMENT NOT NULL, type_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_79291B96C54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dessert_category (dessert_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_C6DA6A2E745B52FD (dessert_id), INDEX IDX_C6DA6A2E12469DE2 (category_id), PRIMARY KEY(dessert_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dinner (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dinner_starter (dinner_id INT NOT NULL, starter_id INT NOT NULL, INDEX IDX_B6DE9293C8B1AA0C (dinner_id), INDEX IDX_B6DE9293AD5A66CC (starter_id), PRIMARY KEY(dinner_id, starter_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dinner_dish (dinner_id INT NOT NULL, dish_id INT NOT NULL, INDEX IDX_66A65765C8B1AA0C (dinner_id), INDEX IDX_66A65765148EB0CB (dish_id), PRIMARY KEY(dinner_id, dish_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dinner_dessert (dinner_id INT NOT NULL, dessert_id INT NOT NULL, INDEX IDX_8FB5AA8EC8B1AA0C (dinner_id), INDEX IDX_8FB5AA8E745B52FD (dessert_id), PRIMARY KEY(dinner_id, dessert_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dinner_accompagnement (dinner_id INT NOT NULL, accompagnement_id INT NOT NULL, INDEX IDX_136C3148C8B1AA0C (dinner_id), INDEX IDX_136C31488E768805 (accompagnement_id), PRIMARY KEY(dinner_id, accompagnement_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dinner_laitier (dinner_id INT NOT NULL, laitier_id INT NOT NULL, INDEX IDX_75B6C9A2C8B1AA0C (dinner_id), INDEX IDX_75B6C9A292D5845D (laitier_id), PRIMARY KEY(dinner_id, laitier_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dish (id INT AUTO_INCREMENT NOT NULL, type_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_957D8CB8C54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dish_category (dish_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_1FB098AA148EB0CB (dish_id), INDEX IDX_1FB098AA12469DE2 (category_id), PRIMARY KEY(dish_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dish_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, code_couleur VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE laitier (id INT AUTO_INCREMENT NOT NULL, type_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_832A78BAC54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE laitier_category (laitier_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_799A9C2392D5845D (laitier_id), INDEX IDX_799A9C2312469DE2 (category_id), PRIMARY KEY(laitier_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lunch (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lunch_starter (lunch_id INT NOT NULL, starter_id INT NOT NULL, INDEX IDX_A935EFADD7C83568 (lunch_id), INDEX IDX_A935EFADAD5A66CC (starter_id), PRIMARY KEY(lunch_id, starter_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lunch_dessert (lunch_id INT NOT NULL, dessert_id INT NOT NULL, INDEX IDX_905ED7B0D7C83568 (lunch_id), INDEX IDX_905ED7B0745B52FD (dessert_id), PRIMARY KEY(lunch_id, dessert_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lunch_dish (lunch_id INT NOT NULL, dish_id INT NOT NULL, INDEX IDX_787686AD7C83568 (lunch_id), INDEX IDX_787686A148EB0CB (dish_id), PRIMARY KEY(lunch_id, dish_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lunch_accompagnement (lunch_id INT NOT NULL, accompagnement_id INT NOT NULL, INDEX IDX_BF2405FD7C83568 (lunch_id), INDEX IDX_BF2405F8E768805 (accompagnement_id), PRIMARY KEY(lunch_id, accompagnement_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lunch_laitier (lunch_id INT NOT NULL, laitier_id INT NOT NULL, INDEX IDX_6A5DB49CD7C83568 (lunch_id), INDEX IDX_6A5DB49C92D5845D (laitier_id), PRIMARY KEY(lunch_id, laitier_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE starter (id INT AUTO_INCREMENT NOT NULL, type_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_4042238BC54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE starter_category (starter_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_67B9C9BAAD5A66CC (starter_id), INDEX IDX_67B9C9BA12469DE2 (category_id), PRIMARY KEY(starter_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE week (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, actual TINYINT(1) NOT NULL, slug VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE accompagnement ADD CONSTRAINT FK_2130A05BC54C8C93 FOREIGN KEY (type_id) REFERENCES dish_type (id)');
        $this->addSql('ALTER TABLE accompagnement_category ADD CONSTRAINT FK_165517478E768805 FOREIGN KEY (accompagnement_id) REFERENCES accompagnement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE accompagnement_category ADD CONSTRAINT FK_1655174712469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE day ADD CONSTRAINT FK_E5A029904A9AE842 FOREIGN KEY (lunch_of_the_day_id) REFERENCES lunch (id)');
        $this->addSql('ALTER TABLE day ADD CONSTRAINT FK_E5A0299063AC8895 FOREIGN KEY (dinner_of_the_day_id) REFERENCES dinner (id)');
        $this->addSql('ALTER TABLE day ADD CONSTRAINT FK_E5A02990C86F3B2F FOREIGN KEY (week_id) REFERENCES week (id)');
        $this->addSql('ALTER TABLE dessert ADD CONSTRAINT FK_79291B96C54C8C93 FOREIGN KEY (type_id) REFERENCES dish_type (id)');
        $this->addSql('ALTER TABLE dessert_category ADD CONSTRAINT FK_C6DA6A2E745B52FD FOREIGN KEY (dessert_id) REFERENCES dessert (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dessert_category ADD CONSTRAINT FK_C6DA6A2E12469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dinner_starter ADD CONSTRAINT FK_B6DE9293C8B1AA0C FOREIGN KEY (dinner_id) REFERENCES dinner (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dinner_starter ADD CONSTRAINT FK_B6DE9293AD5A66CC FOREIGN KEY (starter_id) REFERENCES starter (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dinner_dish ADD CONSTRAINT FK_66A65765C8B1AA0C FOREIGN KEY (dinner_id) REFERENCES dinner (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dinner_dish ADD CONSTRAINT FK_66A65765148EB0CB FOREIGN KEY (dish_id) REFERENCES dish (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dinner_dessert ADD CONSTRAINT FK_8FB5AA8EC8B1AA0C FOREIGN KEY (dinner_id) REFERENCES dinner (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dinner_dessert ADD CONSTRAINT FK_8FB5AA8E745B52FD FOREIGN KEY (dessert_id) REFERENCES dessert (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dinner_accompagnement ADD CONSTRAINT FK_136C3148C8B1AA0C FOREIGN KEY (dinner_id) REFERENCES dinner (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dinner_accompagnement ADD CONSTRAINT FK_136C31488E768805 FOREIGN KEY (accompagnement_id) REFERENCES accompagnement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dinner_laitier ADD CONSTRAINT FK_75B6C9A2C8B1AA0C FOREIGN KEY (dinner_id) REFERENCES dinner (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dinner_laitier ADD CONSTRAINT FK_75B6C9A292D5845D FOREIGN KEY (laitier_id) REFERENCES laitier (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dish ADD CONSTRAINT FK_957D8CB8C54C8C93 FOREIGN KEY (type_id) REFERENCES dish_type (id)');
        $this->addSql('ALTER TABLE dish_category ADD CONSTRAINT FK_1FB098AA148EB0CB FOREIGN KEY (dish_id) REFERENCES dish (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dish_category ADD CONSTRAINT FK_1FB098AA12469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE laitier ADD CONSTRAINT FK_832A78BAC54C8C93 FOREIGN KEY (type_id) REFERENCES dish_type (id)');
        $this->addSql('ALTER TABLE laitier_category ADD CONSTRAINT FK_799A9C2392D5845D FOREIGN KEY (laitier_id) REFERENCES laitier (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE laitier_category ADD CONSTRAINT FK_799A9C2312469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lunch_starter ADD CONSTRAINT FK_A935EFADD7C83568 FOREIGN KEY (lunch_id) REFERENCES lunch (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lunch_starter ADD CONSTRAINT FK_A935EFADAD5A66CC FOREIGN KEY (starter_id) REFERENCES starter (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lunch_dessert ADD CONSTRAINT FK_905ED7B0D7C83568 FOREIGN KEY (lunch_id) REFERENCES lunch (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lunch_dessert ADD CONSTRAINT FK_905ED7B0745B52FD FOREIGN KEY (dessert_id) REFERENCES dessert (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lunch_dish ADD CONSTRAINT FK_787686AD7C83568 FOREIGN KEY (lunch_id) REFERENCES lunch (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lunch_dish ADD CONSTRAINT FK_787686A148EB0CB FOREIGN KEY (dish_id) REFERENCES dish (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lunch_accompagnement ADD CONSTRAINT FK_BF2405FD7C83568 FOREIGN KEY (lunch_id) REFERENCES lunch (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lunch_accompagnement ADD CONSTRAINT FK_BF2405F8E768805 FOREIGN KEY (accompagnement_id) REFERENCES accompagnement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lunch_laitier ADD CONSTRAINT FK_6A5DB49CD7C83568 FOREIGN KEY (lunch_id) REFERENCES lunch (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lunch_laitier ADD CONSTRAINT FK_6A5DB49C92D5845D FOREIGN KEY (laitier_id) REFERENCES laitier (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE starter ADD CONSTRAINT FK_4042238BC54C8C93 FOREIGN KEY (type_id) REFERENCES dish_type (id)');
        $this->addSql('ALTER TABLE starter_category ADD CONSTRAINT FK_67B9C9BAAD5A66CC FOREIGN KEY (starter_id) REFERENCES starter (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE starter_category ADD CONSTRAINT FK_67B9C9BA12469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE accompagnement DROP FOREIGN KEY FK_2130A05BC54C8C93');
        $this->addSql('ALTER TABLE accompagnement_category DROP FOREIGN KEY FK_165517478E768805');
        $this->addSql('ALTER TABLE accompagnement_category DROP FOREIGN KEY FK_1655174712469DE2');
        $this->addSql('ALTER TABLE day DROP FOREIGN KEY FK_E5A029904A9AE842');
        $this->addSql('ALTER TABLE day DROP FOREIGN KEY FK_E5A0299063AC8895');
        $this->addSql('ALTER TABLE day DROP FOREIGN KEY FK_E5A02990C86F3B2F');
        $this->addSql('ALTER TABLE dessert DROP FOREIGN KEY FK_79291B96C54C8C93');
        $this->addSql('ALTER TABLE dessert_category DROP FOREIGN KEY FK_C6DA6A2E745B52FD');
        $this->addSql('ALTER TABLE dessert_category DROP FOREIGN KEY FK_C6DA6A2E12469DE2');
        $this->addSql('ALTER TABLE dinner_starter DROP FOREIGN KEY FK_B6DE9293C8B1AA0C');
        $this->addSql('ALTER TABLE dinner_starter DROP FOREIGN KEY FK_B6DE9293AD5A66CC');
        $this->addSql('ALTER TABLE dinner_dish DROP FOREIGN KEY FK_66A65765C8B1AA0C');
        $this->addSql('ALTER TABLE dinner_dish DROP FOREIGN KEY FK_66A65765148EB0CB');
        $this->addSql('ALTER TABLE dinner_dessert DROP FOREIGN KEY FK_8FB5AA8EC8B1AA0C');
        $this->addSql('ALTER TABLE dinner_dessert DROP FOREIGN KEY FK_8FB5AA8E745B52FD');
        $this->addSql('ALTER TABLE dinner_accompagnement DROP FOREIGN KEY FK_136C3148C8B1AA0C');
        $this->addSql('ALTER TABLE dinner_accompagnement DROP FOREIGN KEY FK_136C31488E768805');
        $this->addSql('ALTER TABLE dinner_laitier DROP FOREIGN KEY FK_75B6C9A2C8B1AA0C');
        $this->addSql('ALTER TABLE dinner_laitier DROP FOREIGN KEY FK_75B6C9A292D5845D');
        $this->addSql('ALTER TABLE dish DROP FOREIGN KEY FK_957D8CB8C54C8C93');
        $this->addSql('ALTER TABLE dish_category DROP FOREIGN KEY FK_1FB098AA148EB0CB');
        $this->addSql('ALTER TABLE dish_category DROP FOREIGN KEY FK_1FB098AA12469DE2');
        $this->addSql('ALTER TABLE laitier DROP FOREIGN KEY FK_832A78BAC54C8C93');
        $this->addSql('ALTER TABLE laitier_category DROP FOREIGN KEY FK_799A9C2392D5845D');
        $this->addSql('ALTER TABLE laitier_category DROP FOREIGN KEY FK_799A9C2312469DE2');
        $this->addSql('ALTER TABLE lunch_starter DROP FOREIGN KEY FK_A935EFADD7C83568');
        $this->addSql('ALTER TABLE lunch_starter DROP FOREIGN KEY FK_A935EFADAD5A66CC');
        $this->addSql('ALTER TABLE lunch_dessert DROP FOREIGN KEY FK_905ED7B0D7C83568');
        $this->addSql('ALTER TABLE lunch_dessert DROP FOREIGN KEY FK_905ED7B0745B52FD');
        $this->addSql('ALTER TABLE lunch_dish DROP FOREIGN KEY FK_787686AD7C83568');
        $this->addSql('ALTER TABLE lunch_dish DROP FOREIGN KEY FK_787686A148EB0CB');
        $this->addSql('ALTER TABLE lunch_accompagnement DROP FOREIGN KEY FK_BF2405FD7C83568');
        $this->addSql('ALTER TABLE lunch_accompagnement DROP FOREIGN KEY FK_BF2405F8E768805');
        $this->addSql('ALTER TABLE lunch_laitier DROP FOREIGN KEY FK_6A5DB49CD7C83568');
        $this->addSql('ALTER TABLE lunch_laitier DROP FOREIGN KEY FK_6A5DB49C92D5845D');
        $this->addSql('ALTER TABLE starter DROP FOREIGN KEY FK_4042238BC54C8C93');
        $this->addSql('ALTER TABLE starter_category DROP FOREIGN KEY FK_67B9C9BAAD5A66CC');
        $this->addSql('ALTER TABLE starter_category DROP FOREIGN KEY FK_67B9C9BA12469DE2');
        $this->addSql('DROP TABLE accompagnement');
        $this->addSql('DROP TABLE accompagnement_category');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE day');
        $this->addSql('DROP TABLE dessert');
        $this->addSql('DROP TABLE dessert_category');
        $this->addSql('DROP TABLE dinner');
        $this->addSql('DROP TABLE dinner_starter');
        $this->addSql('DROP TABLE dinner_dish');
        $this->addSql('DROP TABLE dinner_dessert');
        $this->addSql('DROP TABLE dinner_accompagnement');
        $this->addSql('DROP TABLE dinner_laitier');
        $this->addSql('DROP TABLE dish');
        $this->addSql('DROP TABLE dish_category');
        $this->addSql('DROP TABLE dish_type');
        $this->addSql('DROP TABLE laitier');
        $this->addSql('DROP TABLE laitier_category');
        $this->addSql('DROP TABLE lunch');
        $this->addSql('DROP TABLE lunch_starter');
        $this->addSql('DROP TABLE lunch_dessert');
        $this->addSql('DROP TABLE lunch_dish');
        $this->addSql('DROP TABLE lunch_accompagnement');
        $this->addSql('DROP TABLE lunch_laitier');
        $this->addSql('DROP TABLE starter');
        $this->addSql('DROP TABLE starter_category');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE week');
    }
}
