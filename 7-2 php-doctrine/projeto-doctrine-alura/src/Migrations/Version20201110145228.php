<?php

declare(strict_types=1);

namespace Muriloloffi\Doctrine\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201110145228 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE Phone (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, student_id INTEGER DEFAULT NULL, phoneNumber VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE INDEX IDX_858EB8D9CB944F1A ON Phone (student_id)');
        $this->addSql('CREATE TEMPORARY TABLE __temp__Student AS SELECT studentId, studentName FROM Student');
        $this->addSql('DROP TABLE Student');
        $this->addSql('CREATE TABLE Student (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, studentName VARCHAR(255) NOT NULL COLLATE BINARY)');
        $this->addSql('INSERT INTO Student (id, studentName) SELECT studentId, studentName FROM __temp__Student');
        $this->addSql('DROP TABLE __temp__Student');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE Phone');
        $this->addSql('CREATE TEMPORARY TABLE __temp__Student AS SELECT id, studentName FROM Student');
        $this->addSql('DROP TABLE Student');
        $this->addSql('CREATE TABLE Student (studentName VARCHAR(255) NOT NULL, studentId INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL)');
        $this->addSql('INSERT INTO Student (studentId, studentName) SELECT id, studentName FROM __temp__Student');
        $this->addSql('DROP TABLE __temp__Student');
    }
}
