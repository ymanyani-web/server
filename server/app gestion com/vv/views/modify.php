<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=gestion;charset=utf8', 'root', 'root');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $reponse1 = $bdd->query("SELECT * FROM  products WHERE `id` = $id");
}
$list1 = $bdd->query("SELECT * FROM categorie_piece");
$list2 = $bdd->query("SELECT * FROM marque_piece");
$list3 = $bdd->query("SELECT * FROM fournisseur");
$list4 = $bdd->query("SELECT * FROM marque_vehicule");
if (isset($_POST['update'])) {
    $ref = isset($_POST['ref']) ? $_POST['ref'] : "";
    $designation = isset($_POST['des']) ? $_POST['des'] : "";
    $categorie_pieceId = isset($_POST['categorie_pieceId']) ? $_POST['categorie_pieceId'] : "";
    $marque_pieceId = isset($_POST['marque_pieceId']) ? $_POST['marque_pieceId'] : "";
    $marque_vehiculeId = isset($_POST['marque_vehiculeId']) ? $_POST['marque_vehiculeId'] : "";
    $casier = isset($_POST['casier']) ? $_POST['casier'] : "";
    $pu = isset($_POST['pu']) ? $_POST['pu'] : "";
    $remise = isset($_POST['tr']) ? $_POST['tr'] : "";
    $fournisseurId = isset($_POST['fournisseur']) ? $_POST['fournisseur'] : "";

    $req = $bdd->prepare('UPDATE products SET ref=:r, designation=:d, categorie_pieceId=:ci, marque_pieceId=:mi, marque_vehiculeId=:mv, casier=:ca, pu=:pu, taux_remise=:tr, fournisseurId=:f WHERE id=:i ');
    $req->execute(array(
        'r' => $ref,
        'd' => $designation,
        'ci' => $categorie_pieceId,
        'mi' => $marque_pieceId,
        'mv' => $marque_vehiculeId,
        'ca' => $casier,
        'pu' => $pu,
        'tr' => $remise,
        'f' => $fournisseurId,
        'i' => $id
    ));
    header('Location: products.php?g=2');
}
if (isset($_POST['delete'])) {
    $req1 = $bdd->prepare('DELETE FROM products WHERE id=:i ');
    $req1->execute(array(
        'i' => $id
    ));
    header('Location: products.php?g=3');
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>@@@@</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="../img/favicon.ico" rel="icon">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Nunito:600,700" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="../lib/animate/animate.min.css" rel="stylesheet">
    <!-- <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../lib/flaticon/font/flaticon.css" rel="stylesheet"> -->
    <!--   <link href="../lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" /> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <!-- Template Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
</head>

<body>
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
                    <h2>Modifier un produit</h2>
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

    <!-- Booking End -->



    <form action="#" method="post">
        <div style="margin: auto; margin-top: 50px;">
            <center>
                <div>
                    <?php if (isset($_GET['id'])) { ?>
                        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                        <table class="taaaable table-bordered" id="table_abc">
                            <thead>
                                <th>reference</th>
                                <th>designation</th>
                                <th>categorie piece</th>
                                <th>marque piece</th>
                                <th>marque vehicule</th>
                                <th>casier</th>
                                <th>fournisseur</th>
                                <th>prix unitaire</th>
                                <th>Taux de remise</th>
                                <!-- <th>quantite</th> -->
                            </thead>
                            <?php
                            foreach ($reponse1 as $r) :
                                $fournisseur = $r['fournisseurId'];
                                $category = $r['categorie_pieceId'];
                                $marque_piece = $r['marque_pieceId'];
                                $marque_vehicule = $r['marque_vehiculeId'];
                                $dlist1 = $bdd->query("SELECT * FROM fournisseur WHERE id=$fournisseur");
                                $dlist2 = $bdd->query("SELECT * FROM categorie_piece WHERE id=$category");
                                $dlist3 = $bdd->query("SELECT * FROM marque_piece WHERE id=$marque_piece");
                                $dlist4 = $bdd->query("SELECT * FROM marque_vehicule WHERE id=$marque_vehicule");
                            ?>
                                <tr <?php if ($r['quantite'] >= 1) echo "class='clickable-row-g'";
                                    else  echo "class='clickable-row-r'"; ?> data-href='product-details.php?id=<?php echo $r['id'] ?>'>
                                    <td> <input type="text" value="<?php echo $r['ref'] ?>" name="ref"> </td>
                                    <td><input type="text" value="<?php echo $r['designation'] ?>" name="des"> </td>
                                    <td>
                                        <select name="categorie_pieceId">
                                            <?php
                                            foreach ($list1 as $l1) {
                                                if ($l1['id'] == $r['categorie_pieceId']) {
                                                    $nom = $l1['nom'];
                                                    $id = $l1['id'];
                                                    echo "<option value='$id' selected>$nom";
                                                } else {
                                                    $nom = $l1['nom'];
                                                    $id = $l1['id'];
                                                    echo "<option value='$id'>$nom";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="marque_pieceId">
                                            <?php
                                            foreach ($list2 as $l3) {
                                                if ($l3['id'] == $r['marque_pieceId']) {
                                                    $nom = $l3['nom'];
                                                    $id = $l3['id'];
                                                    echo "<option value='$id' selected>$nom";
                                                } else {
                                                    $nom = $l3['nom'];
                                                    $id = $l3['id'];
                                                    echo "<option value='$id'>$nom";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="marque_vehiculeId">
                                            <?php
                                            foreach ($list4 as $l4) {
                                                if ($l4['id'] == $r['marque_vehiculeId']) {
                                                    $nom = $l4['nom'];
                                                    $id = $l4['id'];
                                                    echo "<option value='$id' selected>$nom";
                                                } else {
                                                    $nom = $l4['nom'];
                                                    $id = $l4['id'];
                                                    echo "<option value='$id'>$nom";
                                                }
                                            }
                                            ?>
                                        </select>

                                    </td>
                                    <td> <input type="text" value="<?php echo $r['casier'] ?>" name="casier"> </td>
                                    <td>
                                        <select name="fournisseur">
                                            <?php
                                            foreach ($list3 as $l3) {
                                                if ($l3['id'] == $r['fournisseurId']) {
                                                    $nom = $l3['nom'];
                                                    $id = $l3['id'];
                                                    echo "<option value='$id' selected>$nom";
                                                } else {
                                                    $nom = $l3['nom'];
                                                    $id = $l3['id'];
                                                    echo "<option value='$id'>$nom";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </td>
                                    <td> <input type="number" value="<?php echo $r['pu'] ?>" name="pu"> </td>
                                    <td> <input type="number" value="<?php echo $r['taux_remise'] ?>" name="tr"> </td>
                                </tr>
                            <?php endforeach;  ?>
                        </table>
                    <?php } ?>
                </div>
            </center>
        </div>
        <input class="button" style="background-color: red; position: fixed; left: 10px; bottom: 10px;" type="submit" value="supprimer" name="delete">
        <input class="button" style="position: fixed; right: 10px; bottom: 10px;" type="submit" value="Mis a jour" name="update">
    </form>
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