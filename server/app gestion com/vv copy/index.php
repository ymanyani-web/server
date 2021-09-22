<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=gestion;charset=utf8', 'root', 'root');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
$reponse1 = $bdd->query("SELECT * FROM categorie_piece");
$reponse2 = $bdd->query("SELECT * FROM marque_piece");
$reponse3 = $bdd->query("SELECT * FROM marque_vehicule");
$reponse4 = $bdd->query("SELECT * FROM fournisseur");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>######</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free Website Template" name="keywords">
    <meta content="Free Website Template" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Nunito:600,700" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <script>
        /* if (performance.navigation.type == performance.navigation.TYPE_RELOAD) {
            console.info("This page is reloaded");
            window.location.replace("admin.php");
        } else {
            console.info("This page is not reloaded");
        } */
    </script>
</head>


<body>
    <!-- Nav Bar Start -->
    <div class="navbar navbar-expand-lg bg-light navbar-light">
        <div class="container-fluid">
            <a href="index.html" class="navbar-brand">habib <span>society</span></a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav ml-auto">
                    <a href="#" class="nav-item nav-link active">Home</a>
                    <a href="admin.php" class="nav-item nav-link ">Admin</a>
                    <!-- <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu">
                            <a href="blog.html" class="dropdown-item">Blog Grid</a>
                            <a href="single.html" class="dropdown-item">Blog Detail</a>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <!-- Nav Bar End -->


    <!-- Page Header Start -->
    <div class="page-header1 mb-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>######</h2>
                </div>
                <div class="col-12">
                    <a href=""></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Food Start -->
    <div class="food mt-0">
        <div class="container">
            <div class="row align-items-center">
                <a >
                    <div class="col-md-4" onclick="document.getElementById('id01').style.display='block'">
                        <div class="food-item">
                        <i class="fas fa-file-invoice"></i>
                            <h3>Operation</h3>
                            <a href=""></a>
                        </div>
                    </div>
                </a>
                <a onclick="window.location.replace('views/products.php')" href="views/products.php">
                    <div class="col-md-4" onclick="window.location.replace('views/products.php')">
                        <div class="food-item">
                            <i class="fas fa-list"></i>
                            <h3>details produits</h3>
                            <a href=""></a>
                        </div>
                    </div>
                </a>

            </div>
        </div>
    </div>
    <!-- Food End -->































    <!-- ajouter divs start-->










    <!-- ajouter divs end -->


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>