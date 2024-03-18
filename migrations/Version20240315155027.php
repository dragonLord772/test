<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240315155027 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE car_driver_id_seq CASCADE');
        $this->addSql('CREATE TABLE driver_car (driver_id INT NOT NULL, car_id INT NOT NULL, PRIMARY KEY(driver_id, car_id))');
        $this->addSql('CREATE INDEX IDX_65F67493C3423909 ON driver_car (driver_id)');
        $this->addSql('CREATE INDEX IDX_65F67493C3C6F69F ON driver_car (car_id)');
        $this->addSql('ALTER TABLE driver_car ADD CONSTRAINT FK_65F67493C3423909 FOREIGN KEY (driver_id) REFERENCES driver (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE driver_car ADD CONSTRAINT FK_65F67493C3C6F69F FOREIGN KEY (car_id) REFERENCES car (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP TABLE car_driver');
        $this->addSql('ALTER TABLE driver ADD current_car_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE driver ADD CONSTRAINT FK_11667CD9C40F2CF1 FOREIGN KEY (current_car_id) REFERENCES car (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_11667CD9C40F2CF1 ON driver (current_car_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE SEQUENCE car_driver_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE car_driver (id INT NOT NULL, car INT NOT NULL, driver INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE driver_car DROP CONSTRAINT FK_65F67493C3423909');
        $this->addSql('ALTER TABLE driver_car DROP CONSTRAINT FK_65F67493C3C6F69F');
        $this->addSql('DROP TABLE driver_car');
        $this->addSql('ALTER TABLE driver DROP CONSTRAINT FK_11667CD9C40F2CF1');
        $this->addSql('DROP INDEX IDX_11667CD9C40F2CF1');
        $this->addSql('ALTER TABLE driver DROP current_car_id');
    }
}
