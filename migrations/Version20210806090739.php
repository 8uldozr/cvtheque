<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210806090739 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE formation DROP FOREIGN KEY FK_404021BF71C15D5C');
        $this->addSql('DROP INDEX IDX_404021BF71C15D5C ON formation');
        $this->addSql('ALTER TABLE formation CHANGE id_formation_id id_cv_id INT NOT NULL');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BF216158D2 FOREIGN KEY (id_cv_id) REFERENCES cv (id)');
        $this->addSql('CREATE INDEX IDX_404021BF216158D2 ON formation (id_cv_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE formation DROP FOREIGN KEY FK_404021BF216158D2');
        $this->addSql('DROP INDEX IDX_404021BF216158D2 ON formation');
        $this->addSql('ALTER TABLE formation CHANGE id_cv_id id_formation_id INT NOT NULL');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BF71C15D5C FOREIGN KEY (id_formation_id) REFERENCES cv (id)');
        $this->addSql('CREATE INDEX IDX_404021BF71C15D5C ON formation (id_formation_id)');
    }
}
