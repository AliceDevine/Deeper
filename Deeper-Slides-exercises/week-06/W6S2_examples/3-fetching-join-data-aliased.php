<?php

class Product
{
    public int $id;
    public string $title;
}

class CheckIn
{
    public int $id;
    public int $productId;
    public string $review;
}

$db = new PDO('mysql:host=mysql;dbname=project', 'root', 'root');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $db->prepare('
  SELECT p.id, p.title, 
  FROM product p
  LEFT JOIN checkin c ON c.product_id = p.id
  WHERE p.id = :id
');
$stmt->execute(['id' => $_GET['id']]);

$productData = $stmt->fetchAll(PDO::FETCH_ASSOC);

var_dump($productData);
