<?php

declare(strict_types=1);

namespace Muriloloffi\Doctrine\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201207114413 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE Course (course_id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, courseName VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE student_courseclass (student_id INTEGER NOT NULL, group_id INTEGER NOT NULL, PRIMARY KEY(student_id, group_id))');
        $this->addSql('CREATE INDEX IDX_AF2CB981CB944F1A ON student_courseclass (student_id)');
        $this->addSql('CREATE INDEX IDX_AF2CB981FE54D947 ON student_courseclass (group_id)');
        $this->addSql('DROP INDEX IDX_858EB8D94EBEE2FE');
        $this->addSql('CREATE TEMPORARY TABLE __temp__Phone AS SELECT id, phoneNumber, student_id_FK FROM Phone');
        $this->addSql('DROP TABLE Phone');
        $this->addSql('CREATE TABLE Phone (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, phoneNumber VARCHAR(255) NOT NULL COLLATE BINARY, student_id_FK INTEGER DEFAULT NULL, CONSTRAINT FK_858EB8D94EBEE2FE FOREIGN KEY (student_id_FK) REFERENCES Student (student_id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO Phone (id, phoneNumber, student_id_FK) SELECT id, phoneNumber, student_id_FK FROM __temp__Phone');
        $this->addSql('DROP TABLE __temp__Phone');
        $this->addSql('CREATE INDEX IDX_858EB8D94EBEE2FE ON Phone (student_id_FK)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE Course');
        $this->addSql('DROP TABLE student_courseclass');
        $this->addSql('DROP INDEX IDX_858EB8D94EBEE2FE');
        $this->addSql('CREATE TEMPORARY TABLE __temp__Phone AS SELECT id, phoneNumber, student_id_FK FROM Phone');
        $this->addSql('DROP TABLE Phone');
        $this->addSql('CREATE TABLE Phone (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, phoneNumber VARCHAR(255) NOT NULL, student_id_FK INTEGER DEFAULT NULL)');
        $this->addSql('INSERT INTO Phone (id, phoneNumber, student_id_FK) SELECT id, phoneNumber, student_id_FK FROM __temp__Phone');
        $this->addSql('DROP TABLE __temp__Phone');
        $this->addSql('CREATE INDEX IDX_858EB8D94EBEE2FE ON Phone (student_id_FK)');
    }
}
