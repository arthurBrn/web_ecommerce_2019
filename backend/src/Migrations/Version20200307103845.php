<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200307103845 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user ADD orders_id INT DEFAULT NULL, CHANGE roles roles JSON NOT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649CFFE9AD6 FOREIGN KEY (orders_id) REFERENCES `order` (id)');
        $this->addSql('CREATE INDEX IDX_8D93D649CFFE9AD6 ON user (orders_id)');
        $this->addSql('ALTER TABLE characteristic CHANGE color color VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE cart CHANGE value value NUMERIC(10, 0) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE cart CHANGE value value NUMERIC(10, 0) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE characteristic CHANGE color color VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649CFFE9AD6');
        $this->addSql('DROP INDEX IDX_8D93D649CFFE9AD6 ON user');
        $this->addSql('ALTER TABLE user DROP orders_id, CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`');
    }
}
