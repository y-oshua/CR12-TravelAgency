<?php
require_once 'db_connect.php';
require_once 'file_upload.php';

if ($_POST) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = mysqli_real_escape_string($connect, $_POST['description']);
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];

    $uploadError = '';
    //this function exists in the service file upload.
    $image = file_upload($_FILES['image']);  // this function is stored in file_upload.php

    $sql = "INSERT INTO places(name, price, description, latitude, longitude, image) VALUES ('$name', $price, '$description', $latitude, $longitude, '$image->fileName')";

    if (mysqli_query($connect, $sql) === true) {
        $class = "success";
        $message = "The place below was successfully added! <br>
            <table class='table w-50'><tr>
            <td> $name </td>
            </tr></table><hr>";
        $uploadError = ($image->error != 0) ? $image->ErrorMessage : '';
    } else {
        $class = "danger";
        $message = "Error while creating media item. Please try again. <br>" . $connect->error;
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
    <title>Add Place</title>
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
    <div class="container mx-auto">
        <div class="mt-3 mb-3">
            <h1>Create request response</h1>
        </div>
        <div class="alert alert-<?= $class; ?>" role="alert">
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