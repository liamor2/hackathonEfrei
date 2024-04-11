<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240411094547 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE wine_proposition (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, region VARCHAR(255) NOT NULL, domain VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, alcohol NUMERIC(4, 2) NOT NULL, sparkling TINYINT(1) NOT NULL, volume NUMERIC(15, 2) NOT NULL, bio TINYINT(1) NOT NULL, type VARCHAR(255) NOT NULL, url VARCHAR(255) NOT NULL, varietal VARCHAR(511) NOT NULL, vintage INT NOT NULL, description LONGTEXT NOT NULL, validated TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE wine CHANGE alcohol alcohol NUMERIC(5, 2) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE wine_proposition');
        $this->addSql('ALTER TABLE wine CHANGE alcohol alcohol NUMERIC(4, 2) DEFAULT NULL');
    }
}
