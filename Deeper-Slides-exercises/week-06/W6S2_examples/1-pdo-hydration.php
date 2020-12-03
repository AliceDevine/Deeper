<?php

class Product
{
    public int $id;
    public string $title;
}

$db = new PDO('mysql:host=mysql;dbname=lecture', 'root', 'root');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $db->prepare('SELECT * FROM `product` WHERE `id` = :id');
$stmt->execute(['id' => $_GET['id']]);

// A single Product instance
$product = $stmt->fetchObject(Product::class);
