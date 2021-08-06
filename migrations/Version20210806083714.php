<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210806083714 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE candidate (id INT AUTO_INCREMENT NOT NULL, id_cv_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, zip VARCHAR(255) NOT NULL, photo VARCHAR(255) NOT NULL, seeking_job_type VARCHAR(255) NOT NULL, seeking_job_contract VARCHAR(255) NOT NULL, availability VARCHAR(255) NOT NULL, registration_date DATETIME NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_C8B28E44216158D2 (id_cv_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cv (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, url_perso VARCHAR(255) NOT NULL, video VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE experiences (id INT AUTO_INCREMENT NOT NULL, id_cv_id INT NOT NULL, title VARCHAR(255) NOT NULL, company VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, start_date DATETIME NOT NULL, end_date DATETIME NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_82020E70216158D2 (id_cv_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formation (id INT AUTO_INCREMENT NOT NULL, id_formation_id INT NOT NULL, title VARCHAR(255) NOT NULL, level VARCHAR(255) NOT NULL, school VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, start_date DATETIME NOT NULL, end_date DATETIME NOT NULL, INDEX IDX_404021BF71C15D5C (id_formation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skills (id INT AUTO_INCREMENT NOT NULL, id_cv_id INT NOT NULL, type VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, level VARCHAR(255) NOT NULL, INDEX IDX_D5311670216158D2 (id_cv_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE candidate ADD CONSTRAINT FK_C8B28E44216158D2 FOREIGN KEY (id_cv_id) REFERENCES cv (id)');
        $this->addSql('ALTER TABLE experiences ADD CONSTRAINT FK_82020E70216158D2 FOREIGN KEY (id_cv_id) REFERENCES cv (id)');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BF71C15D5C FOREIGN KEY (id_formation_id) REFERENCES cv (id)');
        $this->addSql('ALTER TABLE skills ADD CONSTRAINT FK_D5311670216158D2 FOREIGN KEY (id_cv_id) REFERENCES cv (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidate DROP FOREIGN KEY FK_C8B28E44216158D2');
        $this->addSql('ALTER TABLE experiences DROP FOREIGN KEY FK_82020E70216158D2');
        $this->addSql('ALTER TABLE formation DROP FOREIGN KEY FK_404021BF71C15D5C');
        $this->addSql('ALTER TABLE skills DROP FOREIGN KEY FK_D5311670216158D2');
        $this->addSql('DROP TABLE candidate');
        $this->addSql('DROP TABLE cv');
        $this->addSql('DROP TABLE experiences');
        $this->addSql('DROP TABLE formation');
        $this->addSql('DROP TABLE skills');
    }
}
