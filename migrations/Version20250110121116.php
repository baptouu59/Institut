<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250110121116 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE stage_matiere (stage_id INT NOT NULL, matiere_id INT NOT NULL, INDEX IDX_1AED17072298D193 (stage_id), INDEX IDX_1AED1707F46CD258 (matiere_id), PRIMARY KEY(stage_id, matiere_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stage_stagiaire (stage_id INT NOT NULL, stagiaire_id INT NOT NULL, INDEX IDX_7C690D102298D193 (stage_id), INDEX IDX_7C690D10BBA93DD6 (stagiaire_id), PRIMARY KEY(stage_id, stagiaire_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE stage_matiere ADD CONSTRAINT FK_1AED17072298D193 FOREIGN KEY (stage_id) REFERENCES stage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE stage_matiere ADD CONSTRAINT FK_1AED1707F46CD258 FOREIGN KEY (matiere_id) REFERENCES matiere (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE stage_stagiaire ADD CONSTRAINT FK_7C690D102298D193 FOREIGN KEY (stage_id) REFERENCES stage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE stage_stagiaire ADD CONSTRAINT FK_7C690D10BBA93DD6 FOREIGN KEY (stagiaire_id) REFERENCES stagiaire (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE professeur CHANGE matricule matricule INT NOT NULL, CHANGE nom nom VARCHAR(20) NOT NULL, CHANGE prenom prenom VARCHAR(20) NOT NULL');
        $this->addSql('ALTER TABLE stage CHANGE code code VARCHAR(20) NOT NULL, CHANGE date_debut date_debut DATE NOT NULL');
        $this->addSql('ALTER TABLE stagiaire ADD date_inscription DATE NOT NULL, CHANGE code code VARCHAR(10) NOT NULL, CHANGE ville ville VARCHAR(50) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stage_matiere DROP FOREIGN KEY FK_1AED17072298D193');
        $this->addSql('ALTER TABLE stage_matiere DROP FOREIGN KEY FK_1AED1707F46CD258');
        $this->addSql('ALTER TABLE stage_stagiaire DROP FOREIGN KEY FK_7C690D102298D193');
        $this->addSql('ALTER TABLE stage_stagiaire DROP FOREIGN KEY FK_7C690D10BBA93DD6');
        $this->addSql('DROP TABLE stage_matiere');
        $this->addSql('DROP TABLE stage_stagiaire');
        $this->addSql('ALTER TABLE professeur CHANGE matricule matricule VARCHAR(255) NOT NULL, CHANGE nom nom VARCHAR(255) NOT NULL, CHANGE prenom prenom VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE stage CHANGE code code VARCHAR(255) NOT NULL, CHANGE date_debut date_debut VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE stagiaire DROP date_inscription, CHANGE code code VARCHAR(255) NOT NULL, CHANGE ville ville VARCHAR(255) NOT NULL');
    }
}
