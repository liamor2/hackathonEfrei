<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240410152559 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE comments (id INT AUTO_INCREMENT NOT NULL, review VARCHAR(255) NOT NULL, score INT NOT NULL, id_wine_id INT NOT NULL, id_user_id INT NOT NULL, INDEX IDX_5F9E962AF63F1406 (id_wine_id), INDEX IDX_5F9E962A79F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE sales (id INT AUTO_INCREMENT NOT NULL, price NUMERIC(20, 2) NOT NULL, id_wine_id INT NOT NULL, id_user_id INT NOT NULL, INDEX IDX_35215C5AF63F1406 (id_wine_id), UNIQUE INDEX UNIQ_35215C5A79F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, role INT NOT NULL, phone VARCHAR(15) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962AF63F1406 FOREIGN KEY (id_wine_id) REFERENCES wine (id)');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962A79F37AE5 FOREIGN KEY (id_user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE sales ADD CONSTRAINT FK_35215C5AF63F1406 FOREIGN KEY (id_wine_id) REFERENCES wine (id)');
        $this->addSql('ALTER TABLE sales ADD CONSTRAINT FK_35215C5A79F37AE5 FOREIGN KEY (id_user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE wine CHANGE alcohol alcohol NUMERIC(4, 2) DEFAULT NULL, CHANGE vareital varietal VARCHAR(511) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962AF63F1406');
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962A79F37AE5');
        $this->addSql('ALTER TABLE sales DROP FOREIGN KEY FK_35215C5AF63F1406');
        $this->addSql('ALTER TABLE sales DROP FOREIGN KEY FK_35215C5A79F37AE5');
        $this->addSql('DROP TABLE comments');
        $this->addSql('DROP TABLE sales');
        $this->addSql('DROP TABLE users');
        $this->addSql('ALTER TABLE wine CHANGE alcohol alcohol NUMERIC(7, 2) DEFAULT NULL, CHANGE varietal vareital VARCHAR(511) NOT NULL');
    }
}
