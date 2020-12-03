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

function hydrateProductWithCheckins(array $data): Product
{
    $product = new Product();
    $product->id = $data[0]['product_id'];
    $product->title = $data[0]['title'];

    foreach ($data as $checkinRow) {
        $checkIn = new CheckIn();
        $checkIn->id = $checkinRow['id'];
        $checkIn->review = $checkinRow['review'];
        $checkIn->productId = $checkinRow['product_id'];

        $product->addCheckin($checkIn);
    }

    return $product;
}

$db = new PDO('mysql:host=mysql;dbname=project', 'root', 'root');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $db->prepare('
  SELECT * FROM product p
  LEFT JOIN checkin c ON c.product_id = p.id
  WHERE p.id = :id
');
$stmt->execute(['id' => $_GET['id']]);

$productData = $stmt->fetchAll(PDO::FETCH_ASSOC);
$product = hydrateProductWithCheckins($productData);

var_dump($product);
