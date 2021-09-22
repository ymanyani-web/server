<?php
session_start();
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
    $reponse1 = $bdd->query("SELECT * FROM  products WHERE `ref` Like '$var1' AND designation like '$var2' AND fournisseurId LIKE '$var3' AND categorie_pieceId LIKE '$var4' AND marque_pieceId Like '$var5' ");
}
if (isset($_SESSION['cart']))
    $n = count($_SESSION['cart']);
else
    $n = 0;
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>UNION PIECES AGRICOLES</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <style>
        a {
            font-size: 1.1rem;
            color: #343a40;
        }

        a.cart:hover {
            text-decoration: none;
            color: #d60e96;
        }

        a.cart .cart-basket {
            font-size: .6rem;
            position: absolute;
            top: -6px;
            right: -5px;
            width: 15px;
            height: 15px;
            color: #fff;
            background-color: #418deb;
            border-radius: 50%;
        }
    </style>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- FontAwesome -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
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
    <script src="../js/jquery-1.9.1.min.js"></script>
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
                <form action="" method="post">
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
                        <th></th>
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
                            <td class="nonclickable"><input onclick="cart(<?php echo $r['quantite'] ?>, <?php echo $r['id'] ?>, <?= $r['taux_remise'] ?>)" id="<?php echo $r['id'] ?>" type="submit" value="ajouter au panier" <?php if ($r['quantite'] < 1) echo 'disabled'; ?>></td>
                            <!-- <td> <?php/*  echo $r['quantite_global'] */ ?> </td> -->
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



    <div id="add_new">
        <div class="col-xl-9 col-lg-10 col-sm-8 col-7">
            <a href="../config/cart.php" class="cart position-relative d-inline-flex" aria-label="View your shopping cart">
                <i class="fas fa fa-shopping-cart fa-lg fa-3x"></i>
                <span class="cart-basket d-flex align-items-center justify-content-center">
                    <?= $n ?>
                </span>
            </a>
        </div>
        <!-- <button class="button" onclick="window.location.replace('../config/cart.php')"> Finaliser la commande</button> -->
    </div>
    <style>
        .button {
            background-color: #719a0a;
            /* Green */
            border: none;
            color: white;
            padding: 10px 28px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
        }

        #add_new {
            position: fixed;
            right: 10px;
            bottom: 3px;

        }

        #eye:hover {
            color: #fbaf32;
        }

        #taux {
            display: none;
        }
    </style>

    <div id="idg1" class="modal">
        <div class="modal-content animate">
            <div class="imgcontainer">
                <span onclick="document.getElementById('idg1').style.display='none'" class="close" title="Close Modal">&times;</span>
                quantite: <input style="width: 50%;" type="number" min="1" max="" id="inp" required> <br>
                Taux de remise: <input style="width: 50%;" type="number" min="0" max="" id="tr" value="0">% <br>
                <div id="taux"></div> <br>
                <input class="cart button" id="<?php echo $r['id'] ?>" type="submit" value="ajouter au panier">
            </div>
        </div>
    </div>
    <script>
        $(function() {
            $("body").keydown(function(e) {
                e.preventDefault();
                var keyCode = e.keyCode;
                if (keyCode == 112) {
                    if (document.getElementById('taux').style.display == 'block')
                        document.getElementById('taux').style.display = 'none';
                    else
                        document.getElementById('taux').style.display = 'block';
                }
            });
        });
        function cart(q, inp, trr) {
            document.getElementById('idg1').style.display = 'block';
            window.x = q;
            window.i = inp;
            window.tr = trr;
            document.getElementById('taux').innerHTML = window.tr + '%';
        }
        document.getElementById("inp").addEventListener("change", function() {
            let v = parseInt(this.value);
            if (v < 1) this.value = 1;
            if (v > window.x) this.value = window.x;
        });
        document.getElementById("tr").addEventListener("change", function() {
            let t = parseInt(this.value);
            if (t < 0) this.value = 0;
            if (t > window.tr) this.value = window.tr;
        });
        $(".cart").click(function() {
            var t = '#inp'
            var quantite = $(t).val();
            var tr = '#tr'
            var trr = $(tr).val();
            $.get("../config/cart.php?id=" + window.i + "&q=" + quantite + "&t=" + trr, function(data, status) {
                if (status == 'success') {
                    if (data == 'error') {
                        alert("LE PRODUIT EST DEJA AJOUTE");
                    } else
                        alert("LE PRODUIT EST AJOUTE AVEC SUCCES");
                    document.getElementById("inp").value = 1;
                    document.getElementById("tr").value = 0;
                    document.getElementById('idg1').style.display = 'none';
                    $('#add_new').load('products-nonadmin.php' + ' #add_new');
                }
            });
        });
    </script>

    <script>
        var modalg1 = document.getElementById('idg1');

        window.onclick = function(event) {

            if (event.target == modalg1) {
                modalg1.style.display = "none";
            }

        }
    </script>


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