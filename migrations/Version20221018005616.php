<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221018005616 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE labor_information_aleph_group ADD director_id INT DEFAULT NULL, ADD executive_director_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE labor_information_aleph_group ADD CONSTRAINT FK_1A1B9F31899FB366 FOREIGN KEY (director_id) REFERENCES employees (id)');
        $this->addSql('ALTER TABLE labor_information_aleph_group ADD CONSTRAINT FK_1A1B9F31A7DB7C1D FOREIGN KEY (executive_director_id) REFERENCES employees (id)');
        $this->addSql('CREATE INDEX IDX_1A1B9F31899FB366 ON labor_information_aleph_group (director_id)');
        $this->addSql('CREATE INDEX IDX_1A1B9F31A7DB7C1D ON labor_information_aleph_group (executive_director_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE labor_information_aleph_group DROP FOREIGN KEY FK_1A1B9F31899FB366');
        $this->addSql('ALTER TABLE labor_information_aleph_group DROP FOREIGN KEY FK_1A1B9F31A7DB7C1D');
        $this->addSql('DROP INDEX IDX_1A1B9F31899FB366 ON labor_information_aleph_group');
        $this->addSql('DROP INDEX IDX_1A1B9F31A7DB7C1D ON labor_information_aleph_group');
        $this->addSql('ALTER TABLE labor_information_aleph_group DROP director_id, DROP executive_director_id');
    }
}
