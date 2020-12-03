<?php

$db = new PDO('mysql:host=mysql;dbname=project', 'root', 'root');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

class CheckIn
{
    public int $id;
    public int $productId;
    public string $review;
}

function hydrateCheckin(array $data): CheckIn
{
    $checkIn = new CheckIn();
    $checkIn->id = $data['id'];
    $checkIn->productId = $data['product_id']; // Opportunity to rename
    $checkIn->review = $data['review'];

    return $checkIn;
}

$stmt = $db->prepare('SELECT id, product_id, review FROM checkin WHERE product_id = :id');
$stmt->execute(['id' => $_GET['id']]);

$checkins = $stmt->fetchAll(PDO::FETCH_ASSOC);

$hydratedCheckins = array_map(static function (array $checkin): CheckIn {
    return hydrateCheckin($checkin);
}, $checkins);

var_dump($hydratedCheckins);
