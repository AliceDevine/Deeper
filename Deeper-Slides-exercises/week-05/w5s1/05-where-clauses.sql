-- SELECT columnA, columnB FROM table_name WHERE conditions;

SELECT id, title FROM product WHERE id = 2;
SELECT id, title FROM product WHERE id > 3;
SELECT id, title FROM product WHERE id IN (2, 4);

SELECT id, title FROM product WHERE title = 'Milk';
SELECT id, title FROM product WHERE title IN ('Ruler', 'Pencil');
