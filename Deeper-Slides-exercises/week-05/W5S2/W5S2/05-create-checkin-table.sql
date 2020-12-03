-- File: ~/projects/W5S2/05-create-checkin-table.sql

CREATE TABLE `checkin` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `product_id` INT,
  `name` VARCHAR(50),
  `rating` INT,
  `review` VARCHAR(500),
  `posted` DATETIME DEFAULT CURRENT_TIMESTAMP
);
