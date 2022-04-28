<?php
require_once 'actions/db_connect.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API | AJAX</title>

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
                    <a class="nav-link" href="create.php">Add City</a>
                    <a class="nav-link" href="#">About</a>
                    <a class="nav-link" href="#">Contact</a>
                </div>
            </div>
        </nav>
    </div>
    <!-- end .navbar -->

    <div class="container mx-auto">
        <h2>API Request - AJAX</h2>
        <button type="button" id="btn" class="btn btn-outline-dark">Load API</button>
        
        <div id="content" class="row mt-3"></div>

    </div>
    <!-- begin footer -->
    <footer class="py-3 my-4">
        <hr>
        <p class="text-center text-muted">&copy; 2022 Joshua Powell</p>
    </footer>
    <!-- end footer -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script>
        //AJAX function here
        document.getElementById('btn').addEventListener('click', loadApiContent);
        let content = document.getElementById('content');

        function loadApiContent() {
            let ajReq = new XMLHttpRequest();
            ajReq.open("GET", "DisplayAll.php");
            ajReq.onload = function() {
                if (ajReq.status == 200) {
                    console.log(ajReq.responseText)                    
                    const places = JSON.parse(ajReq.responseText);
                    for (const place of places.data) {
                        content.innerHTML += `
                  <div class="col text-center">
                   <div class="card" style="width: 18rem; height: auto">
                   <img src="images/${place.image}" class="card-img-top" alt="${place.name}">
                       <div class="card-body">
                       <h5 class="card-title">${place.name}</h5>
                       <p class="card-text">Price: $${place.price}</p>
                       <p class="card-text">Description: ${place.description}</p>
                       <p class="card-text">Latitude: ${place.latitude}</p>
                       <p class="card-text">Longitude: ${place.longitude}</p>
                       </div>
                   </div>
                   </div>`
                    }
                }
            };
            ajReq.send();
        }
    </script>
</body>

</html>

<!-- Bonus points:

(20) after you create your own API (displayAll.php), create a new file called showAll.php, and that file will have a button, when you click on the button, you will show all data that you got from the API using AJAX. -->