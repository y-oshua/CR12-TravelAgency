<?php
require_once 'db_connect.php';
require_once 'file_upload.php';

if ($_POST) {
    $name = $_POST['name']; // attribute "name" from update.php form
    $price = $_POST['price'];
    $description = mysqli_real_escape_string($connect, $_POST['description']);
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    // image variable defined below

    $id = $_POST['id'];
    //variable for upload images errors is initialised
    $uploadError = '';

    $image = file_upload($_FILES['image']); //file_upload() called 

    if ($image->error === 0) {
        ($_POST["image"] == "place.png") ?: unlink("../images/$_POST[image]"); // unlink deletes old image, also refers to the "name" attribute       
        $sql = "UPDATE places SET name = '$name', price = $price, description = '$description', latitude = $latitude, longitude = $longitude, image = '$image->fileName' WHERE id = {$id}"; // '' not needed for integer items
    } else {
        $sql = "UPDATE places SET name = '$name', price = $price, description = '$description', latitude = $latitude, longitude = $longitude WHERE id = {$id}";
    }
    if (mysqli_query($connect, $sql) === TRUE) {
        $class = "success";
        $message = "The record was successfully updated";
        $uploadError = ($image->error != 0) ? $image->ErrorMessage : '';
    } else {
        $class = "danger";
        $message = "Error while updating record : <br>" . mysqli_connect_error();
        $uploadError = ($image->error != 0) ? $image->ErrorMessage : '';
    }
    mysqli_close($connect);
} else {
    header("location: ../error.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update <?php echo $name ?></title>
    <link rel="icon" type="image/x-icon" href="../images/favicon3.ico">
    <?php require_once '../components/boot.php'; ?>
    <?php require_once '../components/fonts.php'; ?>
    <link rel="stylesheet" href="../components/custom.css">
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
                    <a class="nav-link" aria-current="page" href="../index.php">Home</a>
                    <a class="nav-link" href="../create.php">Add City</a>
                    <a class="nav-link" href="#">About</a>
                    <a class="nav-link" href="#">Contact</a>
                </div>
            </div>
        </nav>
    </div>
    <!-- end .navbar -->
    <div class="container-fluid bg-light mx-auto">
        <div class="mt-3 mb-3">
            <h1>Update request response</h1>
        </div>
        <div class="alert alert-<?php echo $class; ?>" role="alert">
            <p><?php echo ($message) ?? ''; ?></p>
            <p><?php echo ($uploadError) ?? ''; ?></p>
            <a href='../index.php'><button class="btn btn-success" type='button'>Back</button></a>
        </div>
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