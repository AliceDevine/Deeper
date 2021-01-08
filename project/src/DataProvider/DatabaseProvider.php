<?php

namespace App\DataProvider;

use App\Entity\Product;
use App\Hydrator\EntityHydrator;
use PDO;
use PDOException;

class DatabaseProvider
{
    private PDO $dbh;

    public function __construct()
    {
        $username = 'root';
        $password = 'root';

        try {
            $this->dbh = new PDO(
                'mysql:dbname=project;host=mysql',
                $username,
                $password
            );

            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            die('Unable to establish a database connection');
        }
    }

    public function getProducts(): array
    {
        $stmt = $this->dbh->prepare(
            'SELECT * from product');
        $stmt->execute();
        // return $stmt->fetchAll(PDO::FETCH_CLASS, Product::class);
        return $stmt->fetchAll(PDO::FETCH_CLASS, Product::class);
    }
    public function searchProducts(string $searchTerm = ''): array
    {
        $stmt = $this->dbh->prepare('SELECT * FROM product WHERE gin LIKE :searchTerm or where distillery like :searchTerm');
        $stmt->execute([
            'searchTerm' => '%' . $searchTerm . '%'
        ]);

        /** @var Product[] $products */
        return $stmt->fetchAll(PDO::FETCH_CLASS, Product::class);
    }

    public function getProduct(int $productId): Product
    {
        $stmt = $this->dbh->prepare(
            'SELECT
                p.id AS product_id, p.distillery, p.gin, p.image,
                c.id, c.name, c.rating, c.review, c.posted,
                (
                    SELECT AVG(rating)
                    FROM checkin
                    WHERE product_id = p.id
                ) AS average_rating
            FROM product p
            LEFT JOIN checkin AS c ON c.product_id = p.id
            WHERE p.id = :id'
        );
        $stmt->execute([
            'id' => $productId
        ]);

        $productData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($productData) == 0) {
            header("Location: product_listing.php");
            exit();
        } else {
            $hydrator = new EntityHydrator();
            return $hydrator->hydrateProductWithCheckins($productData);
        }
    }
}
