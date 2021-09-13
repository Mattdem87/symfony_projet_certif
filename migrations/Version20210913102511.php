<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210913102511 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE adresse (id INT AUTO_INCREMENT NOT NULL, pays VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, code_postal VARCHAR(255) NOT NULL, numero INT NOT NULL, rue VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE information_medical (id INT AUTO_INCREMENT NOT NULL, id_patient_id INT DEFAULT NULL, numero_securite INT NOT NULL, traitement VARCHAR(255) DEFAULT NULL, bilan VARCHAR(255) DEFAULT NULL, medecin VARCHAR(255) DEFAULT NULL, infirmiere VARCHAR(255) DEFAULT NULL, INDEX IDX_6AEAA7CBCE0312AE (id_patient_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE patient (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, date_de_naissance VARCHAR(255) NOT NULL, lieu_de_naissance VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, INDEX IDX_1ADAD7EBA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE representant_legal (id INT AUTO_INCREMENT NOT NULL, id_patient_id INT DEFAULT NULL, adresse_id_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, numero VARCHAR(255) NOT NULL, INDEX IDX_51277FD3CE0312AE (id_patient_id), INDEX IDX_51277FD31004EF61 (adresse_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE information_medical ADD CONSTRAINT FK_6AEAA7CBCE0312AE FOREIGN KEY (id_patient_id) REFERENCES patient (id)');
        $this->addSql('ALTER TABLE patient ADD CONSTRAINT FK_1ADAD7EBA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE representant_legal ADD CONSTRAINT FK_51277FD3CE0312AE FOREIGN KEY (id_patient_id) REFERENCES patient (id)');
        $this->addSql('ALTER TABLE representant_legal ADD CONSTRAINT FK_51277FD31004EF61 FOREIGN KEY (adresse_id_id) REFERENCES adresse (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE representant_legal DROP FOREIGN KEY FK_51277FD31004EF61');
        $this->addSql('ALTER TABLE information_medical DROP FOREIGN KEY FK_6AEAA7CBCE0312AE');
        $this->addSql('ALTER TABLE representant_legal DROP FOREIGN KEY FK_51277FD3CE0312AE');
        $this->addSql('ALTER TABLE patient DROP FOREIGN KEY FK_1ADAD7EBA76ED395');
        $this->addSql('DROP TABLE adresse');
        $this->addSql('DROP TABLE information_medical');
        $this->addSql('DROP TABLE patient');
        $this->addSql('DROP TABLE representant_legal');
        $this->addSql('DROP TABLE user');
    }
}
