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
    <title>Delete <?php echo $name ?></title>

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


    <div class="container mx-auto">

        <fieldset class="w-75 mt-3 mx-auto">

            <legend class='h2 bg-dark text-light text-center p-3  mt-3 '>Delete request <img class='img-thumbnail' src='images/<?php echo $image ?>' style='width:10%' alt="<?php echo $name ?>"></legend>

            <h5>You have selected the following city:</h5>
            <table class="table table-hover mt-3">
                <tr>
                    <th>Name</th>
                    <td><?php echo $name ?></td>
                </tr>
                <tr>
                    <th>Price</th>
                    <td>$<?php echo $price ?></td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td><?php echo $description ?></td>
                </tr>
                <tr>
                    <th>Latitude</th>
                    <td><?php echo $latitude ?></td>
                </tr>
                <tr>
                    <th>Longitude</th>
                    <td><?php echo $longitude ?></td>
                </tr>
            </table>

            <h3 class="mb-4">Do you really want to delete <em><?php echo $name ?></em>?</h3>
            <form action="actions/a_delete.php" method="post">
                <input type="hidden" name="id" value="<?php echo $id ?>" />
                <input type="hidden" name="image" value="<?php echo $image ?>" />
                <a href="index.php"><button class="btn btn-outline-success" type="button">Back</button></a>
                <button class="btn btn-danger" type="submit">Delete</button>

            </form>
        </fieldset>
    </div>
    <!-- begin footer -->
    <footer class="py-3 my-4">
        <hr>
        <p class="text-center text-muted">&copy; 2022 Joshua Powell</p>
    </footer>
    <!-- end footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>