<?php
    include 'setup.php';
    $results = $dbProvider->getProducts();
    if (isset($_GET['submitted'])) { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Thank you!</strong> Your review has been added, tried any others?.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } ?>

<!DOCTYPE html>
<html>
<?php include 'template/head_includes.php' ?>
<body>
    <?php include 'template/header_includes.php' ?>
    <main class="container-md">
        <div class="card-columns">
            <?php for ($i = 0; $i < count($results); $i++) { ?>
            <div class="card">
                <img class="card-img-top" src="<?=htmlentities($results[$i] -> image)?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?=htmlentities($results[$i] -> gin)?></h5>
                    <p class="card-text"><?=htmlentities($results[$i] -> distillery)?></p>
                    <a href="product.php?id=<?=htmlentities($results[$i] -> id)?>" class="btn btn-green">Find out more</a>
                </div>
            </div>
            <?php } ?>
        </div>
    </main>
   
    <?php include 'template/footer_includes.php' ?>

</body>
</html>