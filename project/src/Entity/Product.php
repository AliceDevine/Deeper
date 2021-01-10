<?php

namespace App\Entity;

class Product
{
    public int $id;
    public string $gin;
    public string $distillery;
    public string $image;
    public string $blurb;
    public string $serve;
    public ?float $averageRating = null;
    /** @var CheckIn[] */
    private array $checkIns = [];

    public function addCheckin(CheckIn $checkIn): void
    {
        $this->checkIns[] = $checkIn;
    }

    public function getCheckins(): array
    {
        return $this->checkIns;
    }
}
