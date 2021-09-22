<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=gestion;charset=utf8', 'root', 'root');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
$list1 = $bdd->query("SELECT * FROM categorie_piece");
$list2 = $bdd->query("SELECT * FROM marque_piece");
$list3 = $bdd->query("SELECT * FROM fournisseur");
if (isset($_POST['ref'])) {
    $var1 = !empty($_POST['ref']) ? $_POST['ref'] : '%';
    $var2 = !empty($_POST['designation']) ? $_POST['designation'] : "%";
    $var3 = !empty($_POST['fournisseur']) ? $_POST['fournisseur'] : '%';
    $var4 = !empty($_POST['type']) ? $_POST['type'] : '%';
    $var5 = !empty($_POST['marque']) ? $_POST['marque'] : '%';

    /* $reponse1 = $bdd->query("SELECT * FROM  products WHERE `ref` LIKE '$var1' AND designation LIKE '$var2' "); */
    $reponse10 = $bdd->query("SELECT * FROM  products WHERE `ref` Like '$var1' AND designation like '$var2' AND fournisseurId LIKE '$var3' AND categorie_pieceId LIKE '$var4' AND marque_pieceId Like '$var5' ");
}

$reponse1 = $bdd->query("SELECT * FROM categorie_piece");
$reponse2 = $bdd->query("SELECT * FROM marque_piece");
$reponse3 = $bdd->query("SELECT * FROM marque_vehicule");
$reponse4 = $bdd->query("SELECT * FROM fournisseur");
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
    </style>
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
    <script>
        if (performance.navigation.type == performance.navigation.TYPE_RELOAD) {
            console.info("This page is reloaded");
            window.location.replace("products.php");
        } else {
            console.info("This page is not reloaded");
        }
    </script>
</head>

<?php
if (!empty($_GET['g'])) {
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
                <h2>filtrer les produits</h2>
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
            <form action="products.php" method="post">
                filtrer par: <br>
                <label for="ref">reference</label>
                <input type="text" name="ref" id="ref">
                <label for="designation">designation</label>
                <input type="text" name="designation" id="designation">
                <label for="fournisseur">fournisseur</label>
                <select name="fournisseur">
                    <option value='' selected>
                        <?php foreach ($list3 as $l3) :
                            $nom = $l3['nom'];
                            $id = $l3['id'];
                            echo "<option value='$id'>$nom";
                        endforeach;
                        ?>
                </select>
                <label for="type">categorie piece</label>
                <select name="type">
                    <option selected></option>
                    <?php foreach ($list1 as $l1) :
                        $nom = $l1['nom'];
                        $id = $l1['id'];
                        echo "<option value='$id'>$nom";
                    endforeach;
                    ?>
                </select>
                <label for="marque">marque</label>
                <select name="marque">
                    <option selected></option>
                    <?php foreach ($list2 as $l2) :
                        $nom = $l2['nom'];
                        $id = $l2['id'];
                        echo "<option value='$id'>$nom";
                    endforeach;
                    ?>
                </select>
                <span style=""><input type="submit" value="chercher" class="button"></span>
            </form>
        </center>
        <div id="add_new">
            <center><button class="button" onclick="document.getElementById('id01').style.display='block'"> Ajouter un nouveau produit</button></center>
        </div>
    </div>
</div>
<!-- Booking End -->



<div style="margin: auto; margin-bottom: 50px;">
    <div>
        <?php if (isset($_POST['ref'])) { ?>
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
                    <th>quantite</th>
                    <th>modifier</th>
                    <!-- <th>quantite</th> -->
                </thead>
                <?php
                foreach ($reponse10 as $r) :
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
                        <td> <?php echo $r['ref'] ?> </td>
                        <td> <?php echo $r['designation'] ?> </td>
                        <td> <?php foreach ($dlist2 as $dl2) : echo $dl2['nom'];
                                endforeach; ?> </td>
                        <td> <?php foreach ($dlist3 as $dl3) : echo $dl3['nom'];
                                endforeach; ?> </td>
                        <td> <?php foreach ($dlist4 as $dl4) : echo $dl4['nom'];
                                endforeach; ?> </td>
                        <td> <?php echo $r['casier'] ?> </td>
                        <td> <?php foreach ($dlist1 as $dl1) : echo $dl1['nom'];
                                endforeach;  ?> </td>
                        <td> <?php echo $r['pu'] ?> </td>
                        <td> <?php echo $r['quantite'] ?> </td>
                        <td class="nonclickable"> <a href="modify.php?id=<?= $r['id'] ?>">modifier</a> </td>
                    </tr>
                <?php endforeach;  ?>
            </table>
        <?php } ?>
    </div>
</div>
<script>
    jQuery(document).ready(function($) {
        $(".clickable-row-r").click(function() {
            window.location = $(this).data("href");
        });
        $(".clickable-row-g").click(function() {
            window.location = $(this).data("href");
        });
        $('.nonclickable').click(function() {
            event.stopPropagation();
        });
    });
</script>
<style>
    .clickable-row-r:hover {
        background: #f5b7b1;
    }

    .clickable-row-g:hover {
        background: #a9dfbf;
    }

    .taaaable {
        width: 90%;
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





<div id="id01" class="modal">
    <form class="modal-content1 animate " action="../config/products.php" method="post" enctype='multipart/form-data'>
        <div class="container">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
            <label for="ref">reference</label>
            <input type="text" name="ref" id="ref" required> <br>
            <label for="designation">designation</label>
            <input type="text" name="designation" id="designation" required> <br>
            <label for="categorie">categorie piece</label>
            <select name="categorie_pieceId">
                <?php foreach ($reponse1 as $r1) :
                    $nom = $r1['nom'];
                    $id = $r1['id'];
                    echo "<option value='$id'>$nom";
                endforeach;
                ?>
            </select>
            <label for="marque_pieceId">marque piece</label>
            <select name="marque_pieceId">
                <?php foreach ($reponse2 as $r2) :
                    $nom = $r2['nom'];
                    $id = $r2['id'];
                    echo "<option value='$id'>$nom";
                endforeach;
                ?>
            </select>
            <label for="marque_vehiculeId">marque vehicule</label>: <br>
            <?php foreach ($reponse3 as $r3) :
                $nom = $r3['nom'];
                $id = $r3['id'];
                echo "<input type='checkbox' name='marque_vehiculeId[]' value='$id'>$nom <br>";
            endforeach;
            ?><br>
            <label for="casier">casier</label>
            <input type="text" name="casier" id="casier"> <br>
            <label for="image">image</label>
            <input class="btn btn-info" type="file" id='upload' name="profile" accept="image/*"> <br>
            <label for="fournisseurId">fournisseur</label>
            <select name="fournisseurId">
                <?php foreach ($reponse4 as $r4) :
                    $nom = $r4['nom'];
                    $id = $r4['id'];
                    echo "<option value='$id'>$nom";
                endforeach;
                ?>
            </select>
            <label for="pu_f">prix unitaire fournisseur</label>
            <input type="number" name="pu_f" id="pu_f"> <br>
            <label for="pu">prix unitaire</label>
            <input type="number" name="pu" id="pu"> <br>
            <label for="remise">taux de remise</label>
            <input type="number" name="remise" id="remise">%<br>
            <textarea name="description" id="" cols="30" rows="10"></textarea> <br> <br>
            <center><input type="submit" value="ajouter"></center>
        </div>
    </form>
</div>


<div id="idg1" class="modal">
    <form class="modal-content animate" action="/action_page.php" method="post">
        <div class="imgcontainer">
            <span onclick="document.getElementById('idg1').style.display='none'" class="close" title="Close Modal">&times;</span>
            <img src="../img/error.png" alt="Avatar" class="avatar">
            <?php
            if ($_GET['g'] == 1)
                echo "<h3>le produit a ete ajoute avec succes</h3>";
            elseif ($_GET['g'] == 2)
                echo "<h3>le produit a ete modifie avec succes</h3>";
            elseif ($_GET['g'] == 3)
                echo "<h3>le produit a ete suprime avec succes</h3>";
            ?>
        </div>
    </form>
</div>

<script>
    var modal2 = document.getElementById('id01');
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