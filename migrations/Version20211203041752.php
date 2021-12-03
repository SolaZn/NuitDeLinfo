<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211203041752 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE sauvetage_sauve');
        $this->addSql('ALTER TABLE sauvetage ADD sauve_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sauvetage ADD CONSTRAINT FK_BBB35C9DD2B99C45 FOREIGN KEY (sauve_id) REFERENCES sauve (id)');
        $this->addSql('CREATE INDEX IDX_BBB35C9DD2B99C45 ON sauvetage (sauve_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE sauvetage_sauve (sauvetage_id INT NOT NULL, sauve_id INT NOT NULL, INDEX IDX_FDA22736D7EC1E46 (sauvetage_id), INDEX IDX_FDA22736D2B99C45 (sauve_id), PRIMARY KEY(sauvetage_id, sauve_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE sauvetage_sauve ADD CONSTRAINT FK_FDA22736D2B99C45 FOREIGN KEY (sauve_id) REFERENCES sauve (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sauvetage_sauve ADD CONSTRAINT FK_FDA22736D7EC1E46 FOREIGN KEY (sauvetage_id) REFERENCES sauvetage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sauvetage DROP FOREIGN KEY FK_BBB35C9DD2B99C45');
        $this->addSql('DROP INDEX IDX_BBB35C9DD2B99C45 ON sauvetage');
        $this->addSql('ALTER TABLE sauvetage DROP sauve_id');
    }
}
