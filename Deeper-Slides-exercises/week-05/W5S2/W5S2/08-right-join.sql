-- File: ~/projects/W5S2/08-right-join.sql

SELECT `product`.`id`, `product`.`title`, `checkin`.`rating`
  FROM `product`
  RIGHT JOIN `checkin` ON `checkin`.`product_id` = `product`.`id`;
