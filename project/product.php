<?php
include 'setup.php';
if (isset($_GET['id'])) {
    $gin = $dbProvider->getProduct($_GET['id']);
}
var_dump($gin);
?>
<!DOCTYPE html>
<html>

<?php include 'template/head_includes.php' ?>

<body>
    <?php include 'template/header_includes.php' ?>
    <main class="container-md">
        <section class="border p-3" style="padding: 20px;">
            <div class="row">
                <div class="col-md-6 location-1">
                    <img class="img-fluid" src="<?=htmlentities($gin->image)?>">
                </div>
                <div class="col-md-6 location-2">
                    <h1><?php echo $gin->gin; ?></h1>
                    <p style="font-size:18px"><?php echo $gin->distillery; ?></p>
                    <p>Talk about tasty Gin</p>
                    <button type="button" class="btn btn-green" data-toggle="modal" data-target="#review">
                        Leave a review
                    </button>

                    <!-- Modal -->
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
                                    <form>
                                        <div class="form-group">
                                            <label for="reviewerEmail">Your email address</label>
                                            <input type="email" class="form-control" id="reviewerEmail" placeholder="name@example.com">
                                        </div>
                                        <div class="form-group">
                                            <label for="ginRating">Rate the gin from 1-5</label>
                                            <select class="form-control" id="ginRating">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="ginReview">Leave a review of the gin<br><span class="small informational">Don't forget to suggest your perfect serve!</span></label>
                                            <textarea class="form-control" id="ginReview" rows="3"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="ginPicture">Taken a picture of your gin?</label>
                                            <input type="file" class="form-control-file" id="ginPicture">
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-green" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-green">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="information">
            <h2 class="mt-4 mb-4">Additional information</h2>
            <div class="border p-3">
                <table class="table">
                    <tr>
                        <td>Average</td>
                        <td id="avStar"><?php echo $gin->averageRating ?></td>
                    </tr>
                    <tr>
                        <td>Another statistic</td>
                        <td>78/100</td>
                    </tr>
                    <tr>
                        <td>Yet another statistic</td>
                        <td>Something</td>
                    </tr>
                </table>
            </div>
        </section>
        <section id="checkAPI">
            <h2 class="mt-4 mb-4">Recent Tipples</h2>
            <div id="checkins"></div>
        </section>
    </main>
    <footer></footer>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://kit.fontawesome.com/7ec1be5194.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        axios.default.headers.common
        axios.get('product.php?id=1')

            .then(function(response) {
                if (response.data.length === 0) {
                    $('<div>').text('No checkins available').appendTo('#checkins');
                    return;
                }

                let averageCheckin = [];

                function getStar(num) {
                    return '<i class="fas fa-star good"></i>'.repeat(num) + '<i class="fas fa-star bad"></i>'.repeat(5 - num);
                }

                for (var i = 0; i < response.data.length; i++) {
                    var checkinElement = $('<div>').addClass('card p-4 mb-4');
                    var h3 = $('<h3>').text(response.data[i].name).appendTo(checkinElement);
                    var checkinRating = response.data[i].rating;
                    averageCheckin.push(checkinRating);
                    let checkStar = getStar(checkinRating);
                    $('<span>').html(checkStar).addClass('pl-3').appendTo(h3);
                    $('<p>').text(response.data[i].review).appendTo(checkinElement);
                    $('#checkins').append(checkinElement);
                };

                function average(num) {
                    return num.reduce((a, b) => (a + b)) / num.length;
                };

                let totalStars = $('<p>');
                let total = Math.floor(average(averageCheckin));
                let averageStars = getStar(total);
                $('<span>').text(total).html(averageStars).appendTo(totalStars);
                $('#avStar').append(totalStars);
            })

            .catch(function(error) {
                console.log(error);
            });
    </script>
</body>

</html>