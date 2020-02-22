<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200215103059 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user ADD artist_id INT DEFAULT NULL, ADD fan_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649B7970CF8 FOREIGN KEY (artist_id) REFERENCES artists (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64989C48F0B FOREIGN KEY (fan_id) REFERENCES fans (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649B7970CF8 ON user (artist_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D64989C48F0B ON user (fan_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649B7970CF8');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64989C48F0B');
        $this->addSql('DROP INDEX UNIQ_8D93D649B7970CF8 ON user');
        $this->addSql('DROP INDEX UNIQ_8D93D64989C48F0B ON user');
        $this->addSql('ALTER TABLE user DROP artist_id, DROP fan_id');
    }
}
