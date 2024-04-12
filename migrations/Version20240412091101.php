<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240412091101 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE comments (id INT AUTO_INCREMENT NOT NULL, review VARCHAR(255) NOT NULL, score INT NOT NULL, creation_date DATETIME NOT NULL, id_wine_id INT NOT NULL, id_user_id INT NOT NULL, INDEX IDX_5F9E962AF63F1406 (id_wine_id), INDEX IDX_5F9E962A79F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE sales (id INT AUTO_INCREMENT NOT NULL, price NUMERIC(20, 2) NOT NULL, creation_date DATETIME NOT NULL, id_wine_id INT NOT NULL, id_user_id INT NOT NULL, INDEX IDX_6B817044F63F1406 (id_wine_id), UNIQUE INDEX UNIQ_6B81704479F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE wine (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, region VARCHAR(255) NOT NULL, domain VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, alcohol NUMERIC(5, 2) DEFAULT NULL, sparkling TINYINT(1) NOT NULL, volume NUMERIC(15, 2) DEFAULT NULL, bio TINYINT(1) NOT NULL, type VARCHAR(255) NOT NULL, url VARCHAR(255) NOT NULL, varietal VARCHAR(511) NOT NULL, vintage INT NOT NULL, description LONGTEXT NOT NULL, creation_date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE wine_proposition (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, region VARCHAR(255) NOT NULL, domain VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, alcohol NUMERIC(4, 2) NOT NULL, sparkling TINYINT(1) NOT NULL, volume NUMERIC(15, 2) NOT NULL, bio TINYINT(1) NOT NULL, type VARCHAR(255) NOT NULL, url VARCHAR(255) NOT NULL, varietal VARCHAR(511) NOT NULL, vintage INT NOT NULL, description LONGTEXT NOT NULL, validated TINYINT(1) NOT NULL, creation_date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962AF63F1406 FOREIGN KEY (id_wine_id) REFERENCES wine (id)');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962A79F37AE5 FOREIGN KEY (id_user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE sales ADD CONSTRAINT FK_6B817044F63F1406 FOREIGN KEY (id_wine_id) REFERENCES wine (id)');
        $this->addSql('ALTER TABLE sales ADD CONSTRAINT FK_6B81704479F37AE5 FOREIGN KEY (id_user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE users MODIFY idUser INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON users');
        $this->addSql('ALTER TABLE users ADD name VARCHAR(255) NOT NULL, ADD lastname VARCHAR(255) NOT NULL, ADD address VARCHAR(255) NOT NULL, ADD phone VARCHAR(15) NOT NULL, ADD password VARCHAR(255) NOT NULL, ADD creation_date DATETIME NOT NULL, DROP nom, DROP prenom, DROP adresse, CHANGE email email VARCHAR(255) NOT NULL, CHANGE role role VARCHAR(4) NOT NULL, CHANGE idUser id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE users ADD PRIMARY KEY (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962AF63F1406');
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962A79F37AE5');
        $this->addSql('ALTER TABLE sales DROP FOREIGN KEY FK_6B817044F63F1406');
        $this->addSql('ALTER TABLE sales DROP FOREIGN KEY FK_6B81704479F37AE5');
        $this->addSql('DROP TABLE comments');
        $this->addSql('DROP TABLE sales');
        $this->addSql('DROP TABLE wine');
        $this->addSql('DROP TABLE wine_proposition');
        $this->addSql('ALTER TABLE users MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON users');
        $this->addSql('ALTER TABLE users ADD nom VARCHAR(50) DEFAULT NULL, ADD prenom VARCHAR(50) DEFAULT NULL, ADD adresse VARCHAR(50) DEFAULT NULL, DROP name, DROP lastname, DROP address, DROP phone, DROP password, DROP creation_date, CHANGE email email VARCHAR(200) DEFAULT NULL, CHANGE role role VARCHAR(50) DEFAULT NULL, CHANGE id idUser INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE users ADD PRIMARY KEY (idUser)');
    }
}
