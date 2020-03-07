<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200307102751 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE relation');
        $this->addSql('ALTER TABLE characteristic CHANGE color color VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE product ADD listing_picture LONGTEXT DEFAULT NULL, DROP listing�picture');
        $this->addSql('ALTER TABLE cart CHANGE value value NUMERIC(10, 0) DEFAULT NULL');
        $this->addSql('ALTER TABLE sub_categorie ADD categorie_id INT NOT NULL');
        $this->addSql('ALTER TABLE sub_categorie ADD CONSTRAINT FK_5B70908ABCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('CREATE INDEX IDX_5B70908ABCF5E72D ON sub_categorie (categorie_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE relation (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE cart CHANGE value value NUMERIC(10, 0) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE characteristic CHANGE color color VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE product ADD listing�picture LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, DROP listing_picture');
        $this->addSql('ALTER TABLE sub_categorie DROP FOREIGN KEY FK_5B70908ABCF5E72D');
        $this->addSql('DROP INDEX IDX_5B70908ABCF5E72D ON sub_categorie');
        $this->addSql('ALTER TABLE sub_categorie DROP categorie_id');
    }
}
