<?php

$db = new PDO('mysql:host=mysql;dbname=project', 'root', 'root');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

class Product
{
    public int $id;
    public string $title;
}

function hydrateProduct(array $data): Product
{
    $product = new Product();
    $product->id = $data['id'];
    $product->title = $data['title'];

    return $product;
}

$stmt = $db->prepare('SELECT id, title FROM product WHERE id = :id');
$stmt->execute(['id' => $_GET['id']]);

$productData = $stmt->fetch(PDO::FETCH_ASSOC);
$product = hydrateProduct($productData);

var_dump($product);
