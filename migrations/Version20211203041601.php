<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211203041601 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bateau (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipage (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sauve (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) DEFAULT NULL, prenom VARCHAR(255) DEFAULT NULL, date_deces DATE DEFAULT NULL, date_naiss DATE DEFAULT NULL, description VARCHAR(1000) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sauvetage (id INT AUTO_INCREMENT NOT NULL, bateau_id INT NOT NULL, equipage_id INT NOT NULL, date_sauvetage DATE NOT NULL, INDEX IDX_BBB35C9DA9706509 (bateau_id), INDEX IDX_BBB35C9DB735E4A0 (equipage_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sauvetage_sauve (sauvetage_id INT NOT NULL, sauve_id INT NOT NULL, INDEX IDX_FDA22736D7EC1E46 (sauvetage_id), INDEX IDX_FDA22736D2B99C45 (sauve_id), PRIMARY KEY(sauvetage_id, sauve_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sauveteur (id INT AUTO_INCREMENT NOT NULL, equipage_id INT DEFAULT NULL, nom VARCHAR(255) DEFAULT NULL, prenom VARCHAR(255) DEFAULT NULL, date_deces DATE DEFAULT NULL, date_naiss DATE DEFAULT NULL, description VARCHAR(1000) NOT NULL, INDEX IDX_479D0155B735E4A0 (equipage_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE sauvetage ADD CONSTRAINT FK_BBB35C9DA9706509 FOREIGN KEY (bateau_id) REFERENCES bateau (id)');
        $this->addSql('ALTER TABLE sauvetage ADD CONSTRAINT FK_BBB35C9DB735E4A0 FOREIGN KEY (equipage_id) REFERENCES equipage (id)');
        $this->addSql('ALTER TABLE sauvetage_sauve ADD CONSTRAINT FK_FDA22736D7EC1E46 FOREIGN KEY (sauvetage_id) REFERENCES sauvetage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sauvetage_sauve ADD CONSTRAINT FK_FDA22736D2B99C45 FOREIGN KEY (sauve_id) REFERENCES sauve (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sauveteur ADD CONSTRAINT FK_479D0155B735E4A0 FOREIGN KEY (equipage_id) REFERENCES equipage (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sauvetage DROP FOREIGN KEY FK_BBB35C9DA9706509');
        $this->addSql('ALTER TABLE sauvetage DROP FOREIGN KEY FK_BBB35C9DB735E4A0');
        $this->addSql('ALTER TABLE sauveteur DROP FOREIGN KEY FK_479D0155B735E4A0');
        $this->addSql('ALTER TABLE sauvetage_sauve DROP FOREIGN KEY FK_FDA22736D2B99C45');
        $this->addSql('ALTER TABLE sauvetage_sauve DROP FOREIGN KEY FK_FDA22736D7EC1E46');
        $this->addSql('DROP TABLE bateau');
        $this->addSql('DROP TABLE equipage');
        $this->addSql('DROP TABLE sauve');
        $this->addSql('DROP TABLE sauvetage');
        $this->addSql('DROP TABLE sauvetage_sauve');
        $this->addSql('DROP TABLE sauveteur');
    }
}
