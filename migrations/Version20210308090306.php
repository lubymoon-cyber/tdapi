<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210308090306 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE expense_sheet_state (id INT AUTO_INCREMENT NOT NULL, wording VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fresh_sheet (id INT AUTO_INCREMENT NOT NULL, user_fresh_sheet_id INT NOT NULL, state_id INT NOT NULL, curriculum_vitae VARCHAR(255) NOT NULL, record_date DATETIME NOT NULL, created_date DATETIME NOT NULL, modification_date DATETIME NOT NULL, INDEX IDX_11EE34F5425397CB (user_fresh_sheet_id), INDEX IDX_11EE34F55D83CC1 (state_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE justificative (id INT AUTO_INCREMENT NOT NULL, support_user_id INT NOT NULL, amount INT NOT NULL, created_date DATETIME NOT NULL, date_production DATETIME NOT NULL, path VARCHAR(255) NOT NULL, INDEX IDX_2AED25311A5BDB69 (support_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE line_charges_outside_the_bundle (id INT AUTO_INCREMENT NOT NULL, line_status_id INT NOT NULL, user_line_charges_outside_the_bundle_id INT NOT NULL, out_of_classification TINYINT(1) NOT NULL, fresh_line_date DATETIME NOT NULL, amount INT NOT NULL, wording VARCHAR(255) NOT NULL, created_date DATETIME NOT NULL, INDEX IDX_C6C6FE4DBF4FBCF (line_status_id), INDEX IDX_C6C6FE448735C52 (user_line_charges_outside_the_bundle_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE line_charges_outside_the_bundle_justificative (line_charges_outside_the_bundle_id INT NOT NULL, justificative_id INT NOT NULL, INDEX IDX_9D7E36EA6ECBE75B (line_charges_outside_the_bundle_id), INDEX IDX_9D7E36EA75A0049F (justificative_id), PRIMARY KEY(line_charges_outside_the_bundle_id, justificative_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE line_fee_package (id INT AUTO_INCREMENT NOT NULL, line_status_id INT NOT NULL, package_fees_id INT NOT NULL, fees_package_user_id INT NOT NULL, date_line_fresh DATETIME NOT NULL, quantity INT NOT NULL, created_date DATETIME NOT NULL, INDEX IDX_AB83F2ADBF4FBCF (line_status_id), INDEX IDX_AB83F2A1330B6A9 (package_fees_id), INDEX IDX_AB83F2A7CBEC723 (fees_package_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE line_fee_package_justificative (line_fee_package_id INT NOT NULL, justificative_id INT NOT NULL, INDEX IDX_2AAA88D8CEFF178E (line_fee_package_id), INDEX IDX_2AAA88D875A0049F (justificative_id), PRIMARY KEY(line_fee_package_id, justificative_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE line_status (id INT AUTO_INCREMENT NOT NULL, wording VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messaging (id INT AUTO_INCREMENT NOT NULL, mail_user_id INT NOT NULL, destination_user_id INT NOT NULL, sender_user_id INT NOT NULL, state TINYINT(1) NOT NULL, archives TINYINT(1) NOT NULL, object LONGTEXT NOT NULL COMMENT \'(DC2Type:object)\', message LONGTEXT NOT NULL, message_date DATETIME NOT NULL, INDEX IDX_EE15BA617DD352FA (mail_user_id), INDEX IDX_EE15BA61C957ECED (destination_user_id), INDEX IDX_EE15BA612A98155E (sender_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE package_fees (id INT AUTO_INCREMENT NOT NULL, wording VARCHAR(255) NOT NULL, amount INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, postal_code VARCHAR(255) NOT NULL, hire_date DATETIME NOT NULL, registration_number VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE fresh_sheet ADD CONSTRAINT FK_11EE34F5425397CB FOREIGN KEY (user_fresh_sheet_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE fresh_sheet ADD CONSTRAINT FK_11EE34F55D83CC1 FOREIGN KEY (state_id) REFERENCES expense_sheet_state (id)');
        $this->addSql('ALTER TABLE justificative ADD CONSTRAINT FK_2AED25311A5BDB69 FOREIGN KEY (support_user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE line_charges_outside_the_bundle ADD CONSTRAINT FK_C6C6FE4DBF4FBCF FOREIGN KEY (line_status_id) REFERENCES line_status (id)');
        $this->addSql('ALTER TABLE line_charges_outside_the_bundle ADD CONSTRAINT FK_C6C6FE448735C52 FOREIGN KEY (user_line_charges_outside_the_bundle_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE line_charges_outside_the_bundle_justificative ADD CONSTRAINT FK_9D7E36EA6ECBE75B FOREIGN KEY (line_charges_outside_the_bundle_id) REFERENCES line_charges_outside_the_bundle (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE line_charges_outside_the_bundle_justificative ADD CONSTRAINT FK_9D7E36EA75A0049F FOREIGN KEY (justificative_id) REFERENCES justificative (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE line_fee_package ADD CONSTRAINT FK_AB83F2ADBF4FBCF FOREIGN KEY (line_status_id) REFERENCES line_status (id)');
        $this->addSql('ALTER TABLE line_fee_package ADD CONSTRAINT FK_AB83F2A1330B6A9 FOREIGN KEY (package_fees_id) REFERENCES package_fees (id)');
        $this->addSql('ALTER TABLE line_fee_package ADD CONSTRAINT FK_AB83F2A7CBEC723 FOREIGN KEY (fees_package_user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE line_fee_package_justificative ADD CONSTRAINT FK_2AAA88D8CEFF178E FOREIGN KEY (line_fee_package_id) REFERENCES line_fee_package (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE line_fee_package_justificative ADD CONSTRAINT FK_2AAA88D875A0049F FOREIGN KEY (justificative_id) REFERENCES justificative (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE messaging ADD CONSTRAINT FK_EE15BA617DD352FA FOREIGN KEY (mail_user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE messaging ADD CONSTRAINT FK_EE15BA61C957ECED FOREIGN KEY (destination_user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE messaging ADD CONSTRAINT FK_EE15BA612A98155E FOREIGN KEY (sender_user_id) REFERENCES `user` (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fresh_sheet DROP FOREIGN KEY FK_11EE34F55D83CC1');
        $this->addSql('ALTER TABLE line_charges_outside_the_bundle_justificative DROP FOREIGN KEY FK_9D7E36EA75A0049F');
        $this->addSql('ALTER TABLE line_fee_package_justificative DROP FOREIGN KEY FK_2AAA88D875A0049F');
        $this->addSql('ALTER TABLE line_charges_outside_the_bundle_justificative DROP FOREIGN KEY FK_9D7E36EA6ECBE75B');
        $this->addSql('ALTER TABLE line_fee_package_justificative DROP FOREIGN KEY FK_2AAA88D8CEFF178E');
        $this->addSql('ALTER TABLE line_charges_outside_the_bundle DROP FOREIGN KEY FK_C6C6FE4DBF4FBCF');
        $this->addSql('ALTER TABLE line_fee_package DROP FOREIGN KEY FK_AB83F2ADBF4FBCF');
        $this->addSql('ALTER TABLE line_fee_package DROP FOREIGN KEY FK_AB83F2A1330B6A9');
        $this->addSql('ALTER TABLE fresh_sheet DROP FOREIGN KEY FK_11EE34F5425397CB');
        $this->addSql('ALTER TABLE justificative DROP FOREIGN KEY FK_2AED25311A5BDB69');
        $this->addSql('ALTER TABLE line_charges_outside_the_bundle DROP FOREIGN KEY FK_C6C6FE448735C52');
        $this->addSql('ALTER TABLE line_fee_package DROP FOREIGN KEY FK_AB83F2A7CBEC723');
        $this->addSql('ALTER TABLE messaging DROP FOREIGN KEY FK_EE15BA617DD352FA');
        $this->addSql('ALTER TABLE messaging DROP FOREIGN KEY FK_EE15BA61C957ECED');
        $this->addSql('ALTER TABLE messaging DROP FOREIGN KEY FK_EE15BA612A98155E');
        $this->addSql('DROP TABLE expense_sheet_state');
        $this->addSql('DROP TABLE fresh_sheet');
        $this->addSql('DROP TABLE justificative');
        $this->addSql('DROP TABLE line_charges_outside_the_bundle');
        $this->addSql('DROP TABLE line_charges_outside_the_bundle_justificative');
        $this->addSql('DROP TABLE line_fee_package');
        $this->addSql('DROP TABLE line_fee_package_justificative');
        $this->addSql('DROP TABLE line_status');
        $this->addSql('DROP TABLE messaging');
        $this->addSql('DROP TABLE package_fees');
        $this->addSql('DROP TABLE `user`');
    }
}
