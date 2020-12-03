CREATE DATABASE lecture;

CREATE TABLE `product` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`title` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`id`)
);

SELECT id, title FROM product WHERE id = 2;
SELECT id, title FROM product WHERE id > 3;
SELECT id, title FROM product WHERE id IN (2, 4);

UPDATE product SET title = 'Protractor' WHERE title = 'Ruler';

DELETE FROM product WHERE id = 4;
