<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240411134540 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE sales (id INT AUTO_INCREMENT NOT NULL, price NUMERIC(20, 2) NOT NULL, id_wine_id INT NOT NULL, id_user_id INT NOT NULL, INDEX IDX_6B817044F63F1406 (id_wine_id), UNIQUE INDEX UNIQ_6B81704479F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE sales ADD CONSTRAINT FK_6B817044F63F1406 FOREIGN KEY (id_wine_id) REFERENCES wine (id)');
        $this->addSql('ALTER TABLE sales ADD CONSTRAINT FK_6B81704479F37AE5 FOREIGN KEY (id_user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE sells DROP FOREIGN KEY FK_35215C5A79F37AE5');
        $this->addSql('ALTER TABLE sells DROP FOREIGN KEY FK_35215C5AF63F1406');
        $this->addSql('DROP TABLE sells');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE sells (id INT AUTO_INCREMENT NOT NULL, price NUMERIC(20, 2) NOT NULL, id_wine_id INT NOT NULL, id_user_id INT NOT NULL, UNIQUE INDEX UNIQ_35215C5A79F37AE5 (id_user_id), INDEX IDX_35215C5AF63F1406 (id_wine_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE sells ADD CONSTRAINT FK_35215C5A79F37AE5 FOREIGN KEY (id_user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE sells ADD CONSTRAINT FK_35215C5AF63F1406 FOREIGN KEY (id_wine_id) REFERENCES wine (id)');
        $this->addSql('ALTER TABLE sales DROP FOREIGN KEY FK_6B817044F63F1406');
        $this->addSql('ALTER TABLE sales DROP FOREIGN KEY FK_6B81704479F37AE5');
        $this->addSql('DROP TABLE sales');
    }
}
