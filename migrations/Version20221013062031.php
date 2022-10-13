<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221013062031 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE employees_property (employees_id INT NOT NULL, property_id INT NOT NULL, INDEX IDX_F5C3D2A28520A30B (employees_id), INDEX IDX_F5C3D2A2549213EC (property_id), PRIMARY KEY(employees_id, property_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE employees_property ADD CONSTRAINT FK_F5C3D2A28520A30B FOREIGN KEY (employees_id) REFERENCES employees (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE employees_property ADD CONSTRAINT FK_F5C3D2A2549213EC FOREIGN KEY (property_id) REFERENCES property (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE employees_property DROP FOREIGN KEY FK_F5C3D2A28520A30B');
        $this->addSql('ALTER TABLE employees_property DROP FOREIGN KEY FK_F5C3D2A2549213EC');
        $this->addSql('DROP TABLE employees_property');
    }
}
