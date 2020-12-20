<?php

namespace App\Entity;

class Product
{
    public int $id;
    public string $title;
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
