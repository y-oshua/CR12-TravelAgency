<?php require_once 'actions/db_connect.php';

$sql = 'SELECT * FROM places';
$result = mysqli_query($connect, $sql); // needs 2 things: connection to db and a query. $connect was defined in db_connect.php

$cards = '';

// // Procedural way
// if (mysqli_num_rows($result) > 0) { 
//         while ($row = mysqli_fetch_assoc($result)) {

// OOP way, see PHP day 3
if ($result->num_rows > 0) {
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {

        $cards .= "<div class='col'>
<div class='card h-100 shadow rounded'>
    <img src='images/" . $row['image'] . "' class='card-img-top' alt='Photo of " . $row['name'] . "'>
    <div class='card-body'>
    <h5 class='card-title'>" . $row['name'] . "</h5>
    <hr>
    <p class='card-text'>Price per night: $" . $row['price'] . "</p>    

    <p class='card-text'><a href='details.php?id=" . $row['id'] . "' class='link-dark'><b>More details!</b></a></p>
    <hr>
    <div class='btn-group-sm role='group'>
    <a href='update.php?id=" . $row['id'] . "'><button class='btn btn-outline-primary' type='button'>Update</button></a>
    <a href='delete.php?id=" . $row['id'] . "'><button class='btn btn-outline-danger' type='button'>Delete</button></a>

    </div>
    </div>
</div>
</div>";
    }
} else {
    $cards = "<div class='col'>
    <div class='card h-50'>
        <img src='error.jpg' class='card-img-top' alt='Error'>
        <div class='card-body'>
        <h5 class='card-title'>Error</h5>
        <p class='card-text'>No data to load</p>

        </div>
    </div>
    </div>";
}


// // trying to figure out better random number thing
// $sql2 = 'SELECT id FROM places;';
// $result2 = mysqli_query($connect, $sql2);
// $rows2 = $result2->fetch_all(MYSQLI_NUM);
// $rand_keys = array_rand($rows2, 1);
// echo $rows2[$rand_keys];


$rando = rand(1, $result->num_rows);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mount Everest | Travel</title>

    <link rel="icon" type="image/x-icon" href="images/favicon3.ico">
    <?php require_once 'components/boot.php'; ?>
    <?php require_once 'components/fonts.php'; ?>
    <link rel="stylesheet" href="components/custom.css">

</head>

<body>

    <!-- begin .navbar -->


    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light">

            <h1 class="navbar-brand">Mount Everest</h1>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    <a class="nav-link" href="create.php">Add City</a>
                    <a class="nav-link" href="#">About</a>
                    <a class="nav-link" href="#">Contact</a>
                </div>
            </div>
        </nav>
    </div>
    <!-- end .navbar -->

    <div class="container mx-auto">

        <div class="welcome bg-dark text-light p-3 mt-3 mx-auto text-center">
            <h1>Hand-picked destinations from around the world</h2>
                <h5>Unbeatable deals, exclusive locations, world-class customer service</h5>

        </div>
        <div class="d-flex justify-content-evenly">
            <p class="mt-3 p-2">Can't decide where to go? <a href='details.php?id=<?= $rando ?>' class='link-dark'><b>Let us help</b></a>
            </p>
            <p class="mt-3 p-2">Like raw data? <a href='displayAll.php' class='link-dark'><b>View the API</b></a>
            </p>
            <p class="mt-3 p-2">Like data, but want a prettier page? <a href='showAll.php' class='link-dark'><b>Clicky</b></a>
            </p>
        </div>
        <!-- begin .cards -->
        <div id="row" class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            <?php echo $cards ?>
        </div>
        <!-- end .cards -->

    </div>
    <!-- end .container -->

    <!-- begin footer -->
    <footer class="py-3 my-4">
        <hr>
        <p class="text-center text-muted">&copy; 2022 Joshua Powell</p>
    </footer>
    <!-- end footer -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>