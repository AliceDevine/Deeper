<?php
    include 'setup.php';
?>

<!DOCTYPE html>
<html>
<?php include 'template/head_includes.php' ?>
<body>
    <?php include 'template/header_includes.php' ?>
    <main class="container-md">
        <div class="card-columns">
            <?php for ($i = 0; $i < count($results); $i++) { ?>
            <div class="card">
                <img class="card-img-top" src="<?=htmlentities($results[$i]['image'])?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?=htmlentities($results[$i]['gin'])?></h5>
                    <p class="card-text"><?=htmlentities($results[$i]['distillery'])?></p>
                    <a href="product.php?id=<?=htmlentities($results[$i]['id'])?>" class="btn btn-green">Find out more</a>
                </div>
            </div>
            <?php } ?>
        </div>
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