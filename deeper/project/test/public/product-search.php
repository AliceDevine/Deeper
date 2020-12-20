<?php

use \App\Entity\Product;

require_once '../src/setup.php';

$searchTerm = '';
if (isset($_GET['search'])) {
    $searchTerm = $_GET['search'];
}

$stmt = $dbh->prepare('SELECT id, title FROM product WHERE title LIKE :searchTerm');
$stmt->execute([
        'searchTerm' => '%' . $searchTerm . '%'
]);

/** @var Product[] $products */
$products = $stmt->fetchAll(PDO::FETCH_CLASS, Product::class);

?>
<!doctype html>
<html lang="en">
<head>
    <?php include 'template_parts/header_includes.php' ?>
    <title>Product Search</title>

    <style>
        .star-rating {
            background-color: grey;
            width: 200px;
            height: 30px;
            display: inline-block;
        }

        .star-rating div {
            height: 100%;
            background-color: yellow;
        }
    </style>
</head>
<body class="p-4">
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="product-list.php">Cats</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="navbar-nav">
                <a class="nav-link" href="product-list.php">
                    Home <span class="sr-only">(current)</span></a>
                <a class="nav-link" href="product-search.php">
                    Search
                </a>
            </div>
        </div>
    </nav>
<h1>Product Search</h1>
    <form>
        <input type="text" name="search" value="<?= $searchTerm ?>">
        <input type="submit">
    </form>
    <?php include 'template_parts/product_table.php' ?>
</div>
<?php include 'template_parts/footer_includes.php' ?>
</body>
</html>
