-- File: ~/projects/W5S2/09-group-by.sql

SELECT `product`.`id`, `product`.`title`,
    AVG(`checkin`.`rating`) AS `average_rating`
  FROM `product`
  LEFT JOIN `checkin` ON `checkin`.`product_id` = `product`.`id`
  GROUP BY `product`.`id`;
