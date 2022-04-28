<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add City</title>

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
                    <a class="nav-link" href="index.php">Home</a>
                    <a class="nav-link active" aria-current="page" href="create.php">Add City</a>
                    <a class="nav-link" href="#">About</a>
                    <a class="nav-link" href="#">Contact</a>
                </div>
            </div>
        </nav>
    </div>
    <!-- end .navbar -->
    <div class="container mx-auto">

        <fieldset class="w-75 mt-3 mx-auto">

            <legend class='h2 bg-dark text-light text-center p-3  mt-3 '>Add City <img class='img-thumbnail' src='images/beach.png' style='width:10%' alt="Picture of a beach"></legend>

            <form action="actions/a_create.php" method="post" enctype="multipart/form-data">
                <table class="table">
                    <tr>
                        <th>Name</th>
                        <td><input class="form-control" type="text" name="name" /></td>
                    </tr>
                    <tr>
                        <th>Price (USD)</th>
                        <td>
                            <input class="form-control" type="number" name="price" step="1">
                        </td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td>
                            <textarea class="form-control" type="text" name="description" maxlength="255" rows="4"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>Latitude</th>
                        <td>
                            <input class="form-control" type="number" step=".00000001" name="latitude">
                        </td>
                    </tr>
                    <th>Longitude</th>
                    <td>
                        <input class="form-control" type="number" step=".000000001" name="longitude">
                    </td>
                    </tr>
                    <tr>
                        <th>Image</th>
                        <td><input class='form-control' type="file" name="image" /></td>
                    </tr>

                    <tr>
                        <td><a href="index.php"><button class='btn btn-outline-success' type="button">Back</button></a></td>
                        <td><button class='btn btn-primary' type="submit">Add City</button></td>
                    </tr>
                </table>
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