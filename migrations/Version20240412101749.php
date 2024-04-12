<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240412101749 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sale ADD CONSTRAINT FK_6B817044F63F1406 FOREIGN KEY (id_wine_id) REFERENCES wine (id)');
        $this->addSql('ALTER TABLE sale ADD CONSTRAINT FK_6B81704479F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_5F9E962AF63F1406 FOREIGN KEY (id_wine_id) REFERENCES wine (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_5F9E962A79F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_5F9E962AF63F1406');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_5F9E962A79F37AE5');
        $this->addSql('ALTER TABLE sale DROP FOREIGN KEY FK_6B817044F63F1406');
        $this->addSql('ALTER TABLE sale DROP FOREIGN KEY FK_6B81704479F37AE5');
    }
}
