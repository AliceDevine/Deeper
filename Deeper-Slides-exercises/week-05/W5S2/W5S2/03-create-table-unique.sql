-- File: ~/projects/W5S2/03-create-table-unique.sql

CREATE TABLE `user` (
	`id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(50),
  `email_address` VARCHAR(50) UNIQUE
);
