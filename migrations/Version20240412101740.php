<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240412101740 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf(
            !$this->connection->getDatabasePlatform() instanceof \Doctrine\DBAL\Platforms\MariaDBPlatform,
            "Migration can only be executed safely on '\Doctrine\DBAL\Platforms\MariaDBPlatform'."
        );

        if (!$schema->hasTable('comments')) {
            $this->addSql('CREATE TABLE comments (id INT AUTO_INCREMENT NOT NULL, review VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, score INT NOT NULL, id_wine_id INT NOT NULL, id_user_id INT NOT NULL, INDEX IDX_5F9E962AF63F1406 (id_wine_id), INDEX IDX_5F9E962A79F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        }
        $this->abortIf(
            !$this->connection->getDatabasePlatform() instanceof \Doctrine\DBAL\Platforms\MariaDBPlatform,
            "Migration can only be executed safely on '\Doctrine\DBAL\Platforms\MariaDBPlatform'."
        );

        if (!$schema->hasTable('sales')) {
            $this->addSql('CREATE TABLE sales (id INT AUTO_INCREMENT NOT NULL, price NUMERIC(20, 2) NOT NULL, id_wine_id INT NOT NULL, id_user_id INT NOT NULL, INDEX IDX_6B817044F63F1406 (id_wine_id), UNIQUE INDEX UNIQ_6B81704479F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        }
        $this->abortIf(
            !$this->connection->getDatabasePlatform() instanceof \Doctrine\DBAL\Platforms\MariaDBPlatform,
            "Migration can only be executed safely on '\Doctrine\DBAL\Platforms\MariaDBPlatform'."
        );

        if (!$schema->hasTable('users')) {
            $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, lastname VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, email VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, address VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, role VARCHAR(4) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, phone VARCHAR(15) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, password VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        }
        $this->abortIf(
            !$this->connection->getDatabasePlatform() instanceof \Doctrine\DBAL\Platforms\MariaDBPlatform,
            "Migration can only be executed safely on '\Doctrine\DBAL\Platforms\MariaDBPlatform'."
        );

        $this->addSql('CREATE TABLE wine (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, region VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, domain VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, country VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, alcohol NUMERIC(5, 2) DEFAULT NULL, sparkling TINYINT(1) NOT NULL, volume NUMERIC(15, 2) DEFAULT NULL, bio TINYINT(1) NOT NULL, type VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, url VARCHAR(511) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, varietal VARCHAR(511) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, vintage INT NOT NULL, description LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf(
            !$this->connection->getDatabasePlatform() instanceof \Doctrine\DBAL\Platforms\MariaDBPlatform,
            "Migration can only be executed safely on '\Doctrine\DBAL\Platforms\MariaDBPlatform'."
        );

        if (!$schema->hasTable('wine_proposition')) {
            $this->addSql('CREATE TABLE wine_proposition (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, region VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, domain VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, country VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, alcohol NUMERIC(4, 2) NOT NULL, sparkling TINYINT(1) NOT NULL, volume NUMERIC(15, 2) NOT NULL, bio TINYINT(1) NOT NULL, type VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, url VARCHAR(511) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, varietal VARCHAR(511) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, vintage INT NOT NULL, description LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, validated TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        }

    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf(
            !$this->connection->getDatabasePlatform() instanceof \Doctrine\DBAL\Platforms\MariaDBPlatform,
            "Migration can only be executed safely on '\Doctrine\DBAL\Platforms\MariaDBPlatform'."
        );

        $this->addSql('DROP TABLE comments');
        $this->abortIf(
            !$this->connection->getDatabasePlatform() instanceof \Doctrine\DBAL\Platforms\MariaDBPlatform,
            "Migration can only be executed safely on '\Doctrine\DBAL\Platforms\MariaDBPlatform'."
        );

        $this->addSql('DROP TABLE sales');
        $this->abortIf(
            !$this->connection->getDatabasePlatform() instanceof \Doctrine\DBAL\Platforms\MariaDBPlatform,
            "Migration can only be executed safely on '\Doctrine\DBAL\Platforms\MariaDBPlatform'."
        );

        $this->addSql('DROP TABLE users');
        $this->abortIf(
            !$this->connection->getDatabasePlatform() instanceof \Doctrine\DBAL\Platforms\MariaDBPlatform,
            "Migration can only be executed safely on '\Doctrine\DBAL\Platforms\MariaDBPlatform'."
        );

        $this->addSql('DROP TABLE wine');
        $this->abortIf(
            !$this->connection->getDatabasePlatform() instanceof \Doctrine\DBAL\Platforms\MariaDBPlatform,
            "Migration can only be executed safely on '\Doctrine\DBAL\Platforms\MariaDBPlatform'."
        );

        $this->addSql('DROP TABLE wine_proposition');
    }
}
