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
    private array $checkins = [];

    public function addCheckin(CheckIn $checkIn): void
    {
        $this->checkins[] = $checkIn;
    }

    public function getCheckins(): array
    {
        return $this->checkins;
    }
}

$product = new Product();
$checkin = new CheckIn();
$product->addCheckin($checkin);

var_dump($product);
