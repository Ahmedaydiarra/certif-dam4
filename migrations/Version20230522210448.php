<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230522210448 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE en_reduction ADD reduction_id INT NOT NULL, ADD produit_id INT NOT NULL');
        $this->addSql('ALTER TABLE en_reduction ADD CONSTRAINT FK_D677FD4AC03CB092 FOREIGN KEY (reduction_id) REFERENCES reduction (id)');
        $this->addSql('ALTER TABLE en_reduction ADD CONSTRAINT FK_D677FD4AF347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('CREATE INDEX IDX_D677FD4AC03CB092 ON en_reduction (reduction_id)');
        $this->addSql('CREATE INDEX IDX_D677FD4AF347EFB ON en_reduction (produit_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE en_reduction DROP FOREIGN KEY FK_D677FD4AC03CB092');
        $this->addSql('ALTER TABLE en_reduction DROP FOREIGN KEY FK_D677FD4AF347EFB');
        $this->addSql('DROP INDEX IDX_D677FD4AC03CB092 ON en_reduction');
        $this->addSql('DROP INDEX IDX_D677FD4AF347EFB ON en_reduction');
        $this->addSql('ALTER TABLE en_reduction DROP reduction_id, DROP produit_id');
    }
}
