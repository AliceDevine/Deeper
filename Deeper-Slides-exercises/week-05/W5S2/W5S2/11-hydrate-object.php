<?php

if (!isset($_GET['id'])) {
    die('Please specify an id in the URL');
}

class Product
{
    public int $id;
    public string $title;
}

$db = new PDO('mysql:host=mysql;dbname=lecture', 'root', 'root');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $db->prepare('SELECT * FROM `product` WHERE `id` = :id');
$stmt->execute(['id' => $_GET['id']]);

$product = $stmt->fetchObject(Product::class);

var_dump($product);
