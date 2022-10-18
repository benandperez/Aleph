<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221017230337 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE working_information_employees DROP FOREIGN KEY FK_4F9CA8938520A30B');
        $this->addSql('ALTER TABLE working_information_employees DROP FOREIGN KEY FK_4F9CA893176DAF8');
        $this->addSql('DROP TABLE working_information_employees');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE working_information_employees (working_information_id INT NOT NULL, employees_id INT NOT NULL, INDEX IDX_4F9CA893176DAF8 (working_information_id), INDEX IDX_4F9CA8938520A30B (employees_id), PRIMARY KEY(working_information_id, employees_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE working_information_employees ADD CONSTRAINT FK_4F9CA8938520A30B FOREIGN KEY (employees_id) REFERENCES employees (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE working_information_employees ADD CONSTRAINT FK_4F9CA893176DAF8 FOREIGN KEY (working_information_id) REFERENCES working_information (id) ON DELETE CASCADE');
    }
}
