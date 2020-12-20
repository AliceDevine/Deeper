<?php

require_once '../src/setup.php';

if (!isset($_GET['id'])) {
    die('Missing id in the URL');
}

$id = $_GET['id'];

$product = $dbProvider->getProduct($id);

if (!$product) {
    header('Location: 404.php');
    exit;
}

?>
<!doctype html>
<html lang="en">
<head>
    <?php include 'template_parts/header_includes.php' ?>
    <title>Products</title>

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
            </div>
        </div>
    </nav>
    <div class="card p-4">

        <div class="row">
            <div class="col-md-6 col-sm-12 text-center">
                <img src="http://placekitten.com/600/300" alt="cat" class="img-fluid">
                <div class="row py-2">
                    <div class="col-4"><img src="http://placekitten.com/200/150" alt="cat" class="img-fluid"></div>
                    <div class="col-4"><img src="http://placekitten.com/200/150" alt="cat" class="img-fluid"></div>
                    <div class="col-4"><img src="http://placekitten.com/200/150" alt="cat" class="img-fluid"></div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <h1><?= $product->gin; ?></h1>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                    ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                    laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                    voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                    non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
                <button type="button" class="btn btn-primary">Check In</button>
            </div>
        </div>
    </div>
    <h2 class="my-4">Additional Information</h2>
    <div class="card p-4 my-4">
        <table class="table">
            <tbody>
            <tr>
                <th>Average Rating</th>
                <td><?= $product->averageRating; ?><img src="assets/4-star-image.JPG" alt="star rating" style="width: 271px;height: 52px;"></td>
            </tr>
            <tr>
                <th>Another Statistic</th>
                <td>78/100</td>
            </tr>
            <tr>
                <th>Yet Another Statistic</th>
                <td>Something useful</td>
            </tr>
            </tbody>
        </table>
    </div>
    <h2 class="my-4">Recent Checkins</h2>

    <div id="checkins">
        <?php foreach ($product->getCheckins() as $checkIn): ?>
            <div class="card p-4 my-4">
                <h3>
                    <?= $checkIn->name ?>
                    <div class="star-rating"><div style="width: <?= $checkIn->rating * 20 ?>%;"></div></div>
                </h3>

                <p>
                    <?= $checkIn->review ?>
                </p>
            </div>
        <?php endforeach; ?>
    </div>

</div>
<?php include 'template_parts/footer_includes.php' ?>
<!-- Axios -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</body>
</html>
