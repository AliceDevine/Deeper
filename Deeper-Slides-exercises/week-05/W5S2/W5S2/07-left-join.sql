-- File: ~/projects/W5S2/07-left-join.sql

SELECT `product`.`id`, `product`.`title`, `checkin`.`rating`
  FROM `product`
  LEFT JOIN `checkin` ON `checkin`.`product_id` = `product`.`id`;
