<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240412130529 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, review VARCHAR(255) NOT NULL, score INT NOT NULL, id_wine_id INT NOT NULL, id_user_id INT NOT NULL, INDEX IDX_9474526CF63F1406 (id_wine_id), INDEX IDX_9474526C79F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE sale (id INT AUTO_INCREMENT NOT NULL, price NUMERIC(20, 2) NOT NULL, id_wine_id INT NOT NULL, id_user_id INT NOT NULL, INDEX IDX_E54BC005F63F1406 (id_wine_id), UNIQUE INDEX UNIQ_E54BC00579F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, role VARCHAR(4) NOT NULL, phone VARCHAR(15) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CF63F1406 FOREIGN KEY (id_wine_id) REFERENCES wine (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C79F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE sale ADD CONSTRAINT FK_E54BC005F63F1406 FOREIGN KEY (id_wine_id) REFERENCES wine (id)');
        $this->addSql('ALTER TABLE sale ADD CONSTRAINT FK_E54BC00579F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962AF63F1406');
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962A79F37AE5');
        $this->addSql('ALTER TABLE sales DROP FOREIGN KEY FK_6B81704479F37AE5');
        $this->addSql('ALTER TABLE sales DROP FOREIGN KEY FK_6B817044F63F1406');
        $this->addSql('DROP TABLE comments');
        $this->addSql('DROP TABLE sales');
        $this->addSql('DROP TABLE users');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE comments (id INT AUTO_INCREMENT NOT NULL, review VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, score INT NOT NULL, id_wine_id INT NOT NULL, id_user_id INT NOT NULL, INDEX IDX_5F9E962AF63F1406 (id_wine_id), INDEX IDX_5F9E962A79F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE sales (id INT AUTO_INCREMENT NOT NULL, price NUMERIC(20, 2) NOT NULL, id_wine_id INT NOT NULL, id_user_id INT NOT NULL, UNIQUE INDEX UNIQ_6B81704479F37AE5 (id_user_id), INDEX IDX_6B817044F63F1406 (id_wine_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, lastname VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, email VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, address VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, role VARCHAR(4) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, phone VARCHAR(15) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, password VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962AF63F1406 FOREIGN KEY (id_wine_id) REFERENCES wine (id)');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962A79F37AE5 FOREIGN KEY (id_user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE sales ADD CONSTRAINT FK_6B81704479F37AE5 FOREIGN KEY (id_user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE sales ADD CONSTRAINT FK_6B817044F63F1406 FOREIGN KEY (id_wine_id) REFERENCES wine (id)');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CF63F1406');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C79F37AE5');
        $this->addSql('ALTER TABLE sale DROP FOREIGN KEY FK_E54BC005F63F1406');
        $this->addSql('ALTER TABLE sale DROP FOREIGN KEY FK_E54BC00579F37AE5');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE sale');
        $this->addSql('DROP TABLE user');
    }
}
