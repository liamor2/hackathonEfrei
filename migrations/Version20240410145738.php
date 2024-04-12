<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240410145738 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE wine ADD domain VARCHAR(255) NOT NULL, ADD country VARCHAR(255) NOT NULL, ADD alcohol NUMERIC(7, 2) DEFAULT NULL, ADD sparkling TINYINT(1) NOT NULL, ADD volume NUMERIC(15, 2) DEFAULT NULL, ADD bio TINYINT(1) NOT NULL, ADD type VARCHAR(255) NOT NULL, ADD url VARCHAR(255) NOT NULL, ADD vareital VARCHAR(511) NOT NULL, ADD vintage INT NOT NULL, ADD description LONGTEXT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE wine DROP domain, DROP country, DROP alcohol, DROP sparkling, DROP volume, DROP bio, DROP type, DROP url, DROP vareital, DROP vintage, DROP description');
    }
}
