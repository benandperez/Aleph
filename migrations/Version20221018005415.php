<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221018005415 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE labor_information_aleph_group_employees (labor_information_aleph_group_id INT NOT NULL, employees_id INT NOT NULL, INDEX IDX_877CE8093F5415B4 (labor_information_aleph_group_id), INDEX IDX_877CE8098520A30B (employees_id), PRIMARY KEY(labor_information_aleph_group_id, employees_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE labor_information_aleph_group_employees ADD CONSTRAINT FK_877CE8093F5415B4 FOREIGN KEY (labor_information_aleph_group_id) REFERENCES labor_information_aleph_group (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE labor_information_aleph_group_employees ADD CONSTRAINT FK_877CE8098520A30B FOREIGN KEY (employees_id) REFERENCES employees (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE labor_information_aleph_group ADD manager_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE labor_information_aleph_group ADD CONSTRAINT FK_1A1B9F31783E3463 FOREIGN KEY (manager_id) REFERENCES employees (id)');
        $this->addSql('CREATE INDEX IDX_1A1B9F31783E3463 ON labor_information_aleph_group (manager_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE labor_information_aleph_group_employees DROP FOREIGN KEY FK_877CE8093F5415B4');
        $this->addSql('ALTER TABLE labor_information_aleph_group_employees DROP FOREIGN KEY FK_877CE8098520A30B');
        $this->addSql('DROP TABLE labor_information_aleph_group_employees');
        $this->addSql('ALTER TABLE labor_information_aleph_group DROP FOREIGN KEY FK_1A1B9F31783E3463');
        $this->addSql('DROP INDEX IDX_1A1B9F31783E3463 ON labor_information_aleph_group');
        $this->addSql('ALTER TABLE labor_information_aleph_group DROP manager_id');
    }
}
