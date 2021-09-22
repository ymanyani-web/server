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

if (isset($_GET['fn'])) {
    $num_facture = $_GET['fn'];
    echo '<script>window.open("views/facture.php?n=' . $num_facture . '", "_blank");</script>';
}

$list1 = $bdd->query("SELECT * FROM client");

?>
<script>
    if (performance.navigation.type == performance.navigation.TYPE_RELOAD) {
        location.replace("index.php");
    }
</script>
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
            <a href="index.php" class="navbar-brand">Union pièces <span>agricoles</span></a>
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
                <a onclick="window.location.replace('views/products-nonadmin.php')" href="views/products-nonadmin.php">
                    <div class="col-md-4" onclick="window.location.replace('views/products-nonadmin.php')">
                        <div class="food-item">
                            <i class="fas fa-list"></i>
                            <h3>details produits</h3>
                            <a href=""></a>
                        </div>
                    </div>
                </a>
                <a onclick="window.location.replace('views/stock.php')" href="views/stock.php">
                    <div class="col-md-4" onclick="window.location.replace('views/stock.php')">
                        <div class="food-item">
                            <i class="fas fa-truck-loading"></i>
                            <h3>Entree de stock</h3>
                            <a href="views/stock.php"></a>
                        </div>
                    </div>
                </a>
                <a onclick="document.getElementById('id02').style.display='block'">
                    <div class="col-md-4" onclick="document.getElementById('id02').style.display='block'">
                        <div class="food-item">
                            <i class="fas fa-money-check-alt"></i>
                            <h5>Regler une facture</h5>
                            <a href=""></a>
                        </div>
                    </div>
                </a>
                <a onclick="document.getElementById('id01').style.display='block'">
                    <div class="col-md-4" onclick="document.getElementById('id01').style.display='block'">
                        <div class="food-item">
                            <i class="fas fa-file-invoice"></i>
                            <h5>Generateur de facture</h5>
                            <a href=""></a>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- Food End -->















    <div id="id01" class="modal">
        <form class="modal-content animate" action="views/facture.php" method="post" target="_blank">
            <div class="container">
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                <center>
                    <label for="nom">numero de facture</label> <br>
                    <input type="number" name="n" id="n" required> <br> <br>
                    <input type="submit" value="envoyer" class="button">
                </center>
            </div>
        </form>
    </div>
    <div id="id02" class="modal">
        <form class="modal-content animate" action="views/regler_facture.php" method="post">
            <div class="container">
                <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
                <center>
                    <select name="idcl" id="" class="butto" style="border: black solid 1px;">
                        <?php foreach ($list1 as $l1) {
                            $cl_id = $l1['id'];
                            $cl_nm = $l1['nom'];
                            echo "<option value='$cl_id'> $cl_nm";
                        }
                        ?>
                    </select>
                    <input type="submit" value="envoyer" class="button">
                </center>
            </div>
        </form>
    </div>

    <script>
        var modal1 = document.getElementById('id01');

        window.onclick = function(event) {
            if (event.target == modal1) {
                modal1.style.display = "none";
            }
        }
    </script>













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