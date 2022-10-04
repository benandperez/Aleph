<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221004054802 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE employees_family_nucleus (employees_id INT NOT NULL, family_nucleus_id INT NOT NULL, INDEX IDX_3619004E8520A30B (employees_id), INDEX IDX_3619004E3EA96A9F (family_nucleus_id), PRIMARY KEY(employees_id, family_nucleus_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE employees_family_nucleus ADD CONSTRAINT FK_3619004E8520A30B FOREIGN KEY (employees_id) REFERENCES employees (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE employees_family_nucleus ADD CONSTRAINT FK_3619004E3EA96A9F FOREIGN KEY (family_nucleus_id) REFERENCES family_nucleus (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE employees_family_nucleus DROP FOREIGN KEY FK_3619004E8520A30B');
        $this->addSql('ALTER TABLE employees_family_nucleus DROP FOREIGN KEY FK_3619004E3EA96A9F');
        $this->addSql('DROP TABLE employees_family_nucleus');
    }
}
