<?php
require_once 'actions/db_connect.php';

if ($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM places WHERE id = {$id}";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_assoc($result);
        $name = $data['name'];
        $price = $data['price'];
        $description = $data['description'];
        $latitude = $data['latitude'];
        $longitude = $data['longitude'];
        $image = $data['image'];
    } else {
        header("location: error.php");
    }
    mysqli_close($connect);
} else {
    header("location: error.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $name ?> Details</title>

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
                    <a class="nav-link" aria-current="page" href="index.php">Home</a>
                    <a class="nav-link" href="create.php">Add City</a>
                    <a class="nav-link" href="#">About</a>
                    <a class="nav-link" href="#">Contact</a>
                </div>
            </div>
        </nav>
    </div>
    <!-- end .navbar -->
    <div class="container">

        <div class="hero mt-3" style="background-image: url('images/<?php echo $image ?>')">
        </div>

        <div class="w-75 mt-3 mx-auto">



            <table class="table">

                <tr>
                    <th>Name</th>
                    <td><?php echo $name ?></td>
                </tr>
                <tr>
                    <th>Price</th>
                    <td>$<?php echo $price ?> per night</td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td><?php echo $description ?></td>
                </tr>
            </table>
            <div id="map"></div>

            <a href="index.php"><button class="btn btn-outline-success mt-3" type="button">Back</button></a>

        </div>

    </div>


    <!-- begin footer -->
    <footer class="py-3 my-4">
        <hr>
        <p class="text-center text-muted">&copy; 2022 Joshua Powell</p>
    </footer>
    <!-- end footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script>
        function initMap() {
            const myLatLng = {
                lat: <?php echo $latitude ?>,
                lng: <?php echo $longitude ?>
            };
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 6,
                center: myLatLng,
            });

            new google.maps.Marker({
                position: myLatLng,
                map,
                title: "<?php echo $name ?>",
            });
        }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtjaD-saUZQ47PbxigOg25cvuO6_SuX3M&callback=initMap" async defer></script>
</body>

</html>