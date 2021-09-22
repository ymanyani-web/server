<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=gestion;charset=utf8', 'root', 'root');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
if (!empty($_POST['nom'])) {
    $var1 = $_POST['nom'];

    $reponse1 = $bdd->query("SELECT * FROM  fournisseur WHERE `nom` = '$var1' ");
}
if (!empty($_POST['ville'])) {
    $var2 = $_POST['ville'];

    /* $reponse1 = $bdd->query("SELECT * FROM  products WHERE `ref` LIKE '$var1' AND designation LIKE '$var2' "); */
    $reponse1 = $bdd->query("SELECT * FROM  fournisseur WHERE `ville` = '$var2' ");
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <style>
        .button {
            background-color: #719a0a;
            /* Green */
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
        }

        #add_new {
            position: fixed;
            right: 10px;

        }
    </style>
    <meta charset="utf-8">
    <title>B###</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="../img/favicon.ico" rel="icon">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Nunito:600,700" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="../lib/animate/animate.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Template Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
    <script>
        if (performance.navigation.type == performance.navigation.TYPE_RELOAD) {
            console.info("This page is reloaded");
            window.location.replace("fournisseur.php");
        } else {
            console.info("This page is not reloaded");
        }
    </script>
</head>
<?php
if ($_GET['g'] == '1') {
    echo "<body onload='document.getElementById(\"idg1\").style.display=\"block\"' style='width:auto;'>";
} else
    echo "<body>";
?>
<!-- Nav Bar Start -->
<div class="navbar navbar-expand-lg bg-light navbar-light">
    <div class="container-fluid">
        <a href="../index.php" class="navbar-brand">Union pièces <span>agricoles</span></a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            <div class="navbar-nav ml-auto">
                <a href="../index.php" class="nav-item nav-link active">Home</a>
                <a href="../admin.php" class="nav-item nav-link">Admin</a>
                <!--                     <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu">
                            <a href="blog.html" class="dropdown-item">Blog Grid</a>
                            <a href="single.html" class="dropdown-item">Blog Detail</a>
                        </div>
                    </div>
-->
            </div>
        </div>
    </div>
</div>
<!-- Nav Bar End -->


<!-- Page Header Start -->
<div class="page-header mb-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>filtrer les fournisseur</h2>
            </div>
            <div class="col-12">
                <a href=""></a>
                <a href=""></a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Booking Start -->
<div class="booking">
    <div class="booking-form">
        <center>
            <form action="" method="post">
                filtrer par: <br>
                <label for="ref">nom</label>
                <input type="text" name="nom" id="nom">
                <label for="designation">ville</label>
                <input type="text" name="ville" id="cin">
                <span style=""><input type="submit" value="chercher"></span>
            </form>
        </center>
        <div id="add_new">
            <button class="button" onclick="document.getElementById('id03').style.display='block'"> Ajouter un nouveau fournisseur</button>
        </div>
    </div>


</div>
<!-- Booking End -->

<div style="margin: auto; margin-bottom: 50px;">
    <div>
        <?php if (isset($_POST['nom'])) { ?>
            <table class="taaaable table-bordered" id="table_abc">
                <thead>
                    <th>nom</th>
                    <th>Numero telephone</th>
                    <th>Adresse</th>
                    <th>ville</th>
                    <th>email</th>
                    <!-- <th>quantite</th> -->
                </thead>
                <?php
                foreach ($reponse1 as $r) :
                ?>
                    <tr class='' data-href='product-details.php?id=<?php echo $r['id'] ?>'>
                        <td> <?php echo $r['nom'] ?> </td>
                        <td> <?php echo $r['telephone'] ?> </td>
                        <td> <?php echo $r['adresse'] ?> </td>
                        <td> <?php echo $r['ville'] ?> </td>
                        <td> <?php echo $r['email'] ?> </td>
                    </tr>
                <?php endforeach;  ?>
            </table>
        <?php } ?>
    </div>
</div>
<script>
    jQuery(document).ready(function($) {
        $(".clickable-row").click(function() {
            window.location = $(this).data("href");
        });
    });
</script>
<style>
    tr:hover {
        background: red;
    }

    .taaaable {
        width: 80%;
        margin: auto;
    }
</style>

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
<div id="id03" class="modal">
    <form class="modal-content animate" action="../config/fournisseur.php" method="post">
        <div class="container">
            <center><label for="nom">nom et prenom</label><br>
                <input type="text" name="nom" id="nom" required> <br>
                <label for="telephone">telephone</label><br>
                <input type="text" name="telephone" id="telephone"> <br>
                <label for="adresse">adresse</label><br>
                <input type="text" name="adresse" id="adresse"> <br>
                <label for="ville">ville</label><br>
                <input type="text" name="ville" id="ville"> <br>
                <label for="email">email</label><br>
                <input type="email" name="email" id="email"> <br> <br>
                <input type="submit" value="ajouter"></center>
        </div>
    </form>
</div>

<div id="idg1" class="modal">
    <form class="modal-content animate" action="/action_page.php" method="post">
        <div class="imgcontainer">
            <span onclick="document.getElementById('idg1').style.display='none'" class="close" title="Close Modal">&times;</span>
            <img src="../img/error.png" alt="Avatar" class="avatar">
            <h3>le produit a ete ajoute avec succes</h3>
        </div>
    </form>
</div>

<script>
    var modal2 = document.getElementById('id03');
    var modalg1 = document.getElementById('idg1');


    window.onclick = function(event) {

        if (event.target == modal2) {
            modal2.style.display = "none";
        }
        if (event.target == modalg1) {
            modalg1.style.display = "none";
        }

    }
</script>
</body>

</html>