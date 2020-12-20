<?php

$db = new PDO('mysql:host=mysql;dbname=project', 'root', 'root');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_GET['id'])) {

    $statement = $db->prepare('SELECT `product`.`id`, `product`.`distillery`,`product`.`gin` FROM `product` where `id` = :id');

    $statement->execute([
        'id' => $_GET['id']
    ]);
    $results = $statement->fetchAll();

    var_dump($results);

    $record = $results[0];
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <header>&nbsp;</header>
    <main class="container-md">
        <section class="border p-3" style="padding: 20px;">
            <div class="row">
                <div class="col-md-6 location-1">
                    <div id="catursel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="images/cat1.jpg" alt="First cat">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="images/cat2.jpg" alt="Second cat">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="images/cat3.jpg" alt="Third cat">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="images/cat4.jpg" alt="Fourth cat">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="images/cat5.jpg" alt="Fifth cat">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#catursel" role="button" data-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="sr-only">Previous</span></a>
                        <a class="carousel-control-next" href="#catursel" role="button" data-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span><span class="sr-only">Next</span></a>
                    </div>
                </div>
                <div class="col-md-6 location-2">
                    <h1><?php echo $record['gin']; ?></h1>
                    <p style="font-size:18px"><?php echo $record['distillery']; ?></p>
                    <p>Talk about tasty Gin</p>
                    <a class="btn btn-primary" href="#">Leave a review</a>
                </div>
            </div>
        </section>
        <section id="information">
            <h2 class="mt-4 mb-4">Additional information</h2>
            <div class="border p-3">
                <table class="table">
                    <tr>
                        <td>Average</td>
                        <td id="avStar"></td>
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