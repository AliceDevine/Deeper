<?php

if (!isset($_GET['id'])) {
    die('Please specify an id in the URL');
}

class Product
{
    public int $id;
    public string $title;
    /** @var Checkin[] **/
    public array $checkIns;
}

class CheckIn
{
    public int $id;
    public int $product_id;
    public string $name;
    public int $rating;
    public string $review;
    public string $posted;
}

$db = new PDO('mysql:host=mysql;dbname=project', 'root', 'root');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $db->prepare('SELECT * FROM `product` WHERE `id` = :id');
$stmt->execute(['id' => $_GET['id']]);

$product = $stmt->fetchObject(Product::class);

$stmt = $db->prepare('SELECT * FROM `checkin` WHERE `product_id` = :product_id');
$stmt->execute(['product_id' => $product->id]);

$product->checkIns = $stmt->fetchAll(PDO::FETCH_CLASS, CheckIn::class);

var_dump($product);
