<?php

namespace App\Hydrator;

use App\Entity\CheckIn;
use App\Entity\Product;

class EntityHydrator
{
    public function hydrateProduct(array $data): Product
    {
        $product = new Product();
        $product->id = $data['id'];
        $product->gin = $data['gin'];
        $product->distillery =$data['distillery'];
        $product->image = $data['image'];
        $product->averageRating = $data['average_rating'];
        
        return $product;
    }

    public function hydrateCheckIn(array $data): CheckIn
    {
        $checkIn = new CheckIn();
        $checkIn->id = $data['id'];
        $checkIn->product_id = $data['product_id'];
        $checkIn->name = $data['name'];
        $checkIn->rating = $data['rating'];
        $checkIn->review = $data['review'];
        $checkIn->posted = $data['posted'] ?? null;

        return $checkIn;
    }

    public function hydrateProductWithCheckins(array $data): Product
    {
        $productData = [
            'id' => $data[0]['product_id'],
            'gin' => $data[0]['gin'],
            'distillery' => $data[0]['distillery'],
            'image' => $data[0]['image'],
            'average_rating' => $data[0]['average_rating'],
        ];
        $product = $this->hydrateProduct($productData);
        if ($data[0]['id'] == null) {
            // no checkins so do nothing
        } else {
            foreach ($data as $checkInData) {
                $checkIn = $this->hydrateCheckIn($checkInData);
                $product->addCheckin($checkIn);
            }
        }
        return $product;
    }
}
