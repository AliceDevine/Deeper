<?php
include 'setup.php';
if (isset($_GET['id'])) {
    $gin = $dbProvider->getProduct($_GET['id']);
    $checkins = $gin->getCheckins();
    if (!empty($_POST)) {
        $dbProvider->addCheckin($_POST, $_GET['id']);
        header("Location: product_listing.php?submitted=true");
        exit();
    }
    ?>
    <!DOCTYPE html>
    <html>
    <?php include 'template/head_includes.php' ?>
    <body>
    <?php include 'template/header_includes.php' ?>

    <main class="container-md mt-4">
        <section class="border p-3" style="padding: 20px;">
            <div class="row">
                <div class="col-md-6 location-1">
                    <img class="img-fluid" alt="<?= htmlentities($gin->gin) ?>" src="<?= htmlentities($gin->image) ?>">
                </div>
                <div class="col-md-6 location-2">
                    <h1><?php echo $gin->gin; ?></h1>
                    <p style="font-size:16px">Distilled by: <?php echo $gin->distillery; ?></p>
                    <?php echo $gin->blurb; ?>
                    <button type="button" class="btn btn-green" data-toggle="modal" data-target="#review">Leave a review</button>
                    <div class="modal fade" id="review" tabindex="-1" role="dialog" aria-labelledby="Label" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Your review</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="post">
                                        <div class="form-group">
                                            <label for="reviewerEmail">Your name</label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="John Smith">
                                        </div>
                                        <div class="form-group">
                                            <label for="ginRating">Rate the gin from 1-5</label>
                                            <select class="form-control" id="ginRating" name="ginRating">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="ginReview">Leave a review of the gin<br><span class="small informational">Don't forget to suggest your perfect serve!</span></label>
                                            <textarea class="form-control" name="review" id="ginReview" rows="3"></textarea>
                                        </div>
                                        <button type="button" class="btn btn-outline-green" data-dismiss="modal">Close</button>
                                        <input type="submit" class="btn btn-green">
                                    </form>
                                </div>
                                <div class="modal-footer">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="information">
            <div class="border p-3">
                <table class="table">
                    <tr>
                        <td>Based on all reviews of this gin it's been rated:</td>
                        <td id="avStar"></td>
                    </tr>
                    <tr>
                        <td>The suggested perfect serve is:</td>
                        <td><?php echo $gin->serve; ?></td>
                    </tr>
                </table>
            </div>
        </section>
        <section id="checkAPI">
            <h2 class="mt-4 mb-4">Recent Tipples</h2>
            <?php if (count($checkins) == 0) { ?>
                <p>There have not been any reviews of this gin yet. You could be the first!</p>
                <button type="button" class="btn btn-green" data-toggle="modal" data-target="#review">
                    Leave a review
                </button>
            <?php } else { ?>
                <div class="card-columns">
                    <?php for ($i = 0; $i < count($checkins); $i++) { ?>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlentities($checkins[$i]->name) ?></h5>
                                <p class="card-text">I rate this gin <?= htmlentities($checkins[$i]->rating) ?>/5</p>
                                <p class="card-text"><?= htmlentities($checkins[$i]->review) ?></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </section>
    </main>
    <?php include 'template/footer_includes.php' ?>

    <script>
        function getStar(num) {
            return '<i class="fas fa-star good"></i>'.repeat(num) + '<i class="fas fa-star bad"></i>'.repeat(5 - num);
        }
        <?php if (count($checkins) == 0) { ?>
        document.getElementById("avStar").innerHTML = getStar(Math.floor(0)) + "<br><i>No reviews yet, it's your duty to try it!</i>";
        <?php } else { ?>
        document.getElementById("avStar").innerHTML = getStar(Math.floor(<?php echo $gin->averageRating ?>));
        <?php } ?>
    </script>
    </body>
    </html>
    <?php
} else {
    header("Location: product_listing.php");
    exit();
} ?>