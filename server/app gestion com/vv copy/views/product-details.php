<?php
if (isset($_GET['id'])) {
    $idd = $_GET['id'];
} else {
    echo "not good";
    exit;
}

try {
    $bdd = new PDO('mysql:host=localhost;dbname=gestion;charset=utf8', 'root', 'root');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
$response = $bdd->query('SELECT * FROM `products` WHERE id = ' . $idd . ';');
$products = [];
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Burger King - Food Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free Website Template" name="keywords">
    <meta content="Free Website Template" name="description">

    <!-- Favicon -->
    <link href="../img/favicon.ico" rel="icon">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Nunito:600,700" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="../lib/animate/animate.min.css" rel="stylesheet">
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../lib/flaticon/font/flaticon.css" rel="stylesheet">
    <link href="../lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
</head>

<body style="background-color: lightgray;">
    <!-- Nav Bar Start -->
    <div class="navbar navbar-expand-lg bg-light navbar-light" style="background-color: gray;">
        <div class="container-fluid">
            <a href="../index.php" class="navbar-brand">Habib <span>society</span></a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav ml-auto">
                    <a href="../index.php" class="nav-item nav-link active">Home</a>
                    <a href="../admin.php" class="nav-item nav-link ">Admin</a>
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

    <!-- Page Header End -->


    <!-- Food Start -->

    <!-- Food End -->


    <!-- Menu Start -->
    <?php
    while ($row = $response->fetch()) {
    ?>
        <div class="menu">
            <div class="container">
                <br>
                <br>
                <br>

                <div class="menu-tab">

                    <div class="tab-content">
                        <div id="burgers" class="container tab-pane active">
                            <div class="row">
                                <div class="col-lg-7 col-md-12">
                                    <div class="menu-item">
                                        <h1><?php echo $row['designation']; ?></h1>
                                    </div>
                                    <div class="menu-item">
                                        <div class="menu-img">
                                            <img src="../img/menu-burger.jpg" alt="Image">
                                        </div>
                                        <div class="menu-text">
                                            <h3><span>Quantite</span> <strong><?php echo $row['quantite']; ?></strong></h3>
                                        </div>
                                    </div>
                                    <div class="menu-item">
                                        <div class="menu-img">
                                            <img src="../img/menu-burger.jpg" alt="Image">
                                        </div>
                                        <div class="menu-text">
                                            <h3><span>Prix unitaire</span> <strong><?php echo $row['pu']; ?> MAD</strong></h3>
                                        </div>
                                    </div>
                                    <div class="menu-item">
                                        <div class="menu-img">
                                            <img src="../img/menu-burger.jpg" alt="Image">
                                        </div>
                                        <div class="menu-text">
                                            <h3><span>Taux de remise</span> <strong><?php echo $row['taux_remise']; ?>%</strong></h3>
                                        </div>
                                    </div>
                                    <div class="menu-item">
                                        <div class="menu-img">
                                            <img src="../img/menu-burger.jpg" alt="Image">
                                        </div>
                                        <div class="../menu-text">
                                            <h3><span>Description</span></h3>
                                            <p><?php echo $row['description']; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5 d-none d-lg-block">
                                    <img src="../<?php echo $row['image']; ?>" alt="Image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
    <!-- Menu End -->




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