<?php

class CheckIn
{
    public int $id;
    public int $productId;
    public string $review;
}

class Product
{
    public int $id;
    public string $title;
    /** @var CheckIn[] */
    public array $checkins = [];
}

$product = new Product();
$checkin = new CheckIn();
$product->checkins[] = $checkin;
$product->checkins[] = 12345;
$product->checkins[] = 'This is not a check-in?';

var_dump($product);
