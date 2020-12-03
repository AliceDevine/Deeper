
SELECT p.id FROM product p

SELECT p.id
FROM product p
INNER JOIN checkin c
  ON c.product_id = p.id
