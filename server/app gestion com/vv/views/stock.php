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
    $reponse1 = $bdd->query("SELECT * FROM  products WHERE `ref` Like '$var1' AND designation like '$var2' AND fournisseurId LIKE '$var3' AND categorie_pieceId LIKE '$var4' AND marque_pieceId Like '$var5' ");
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Union pieces agricoles</title>
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
                    <h2>Veuillez selectioner un produit</h2>
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
                        <tr <?php if ($r['quantite'] >= 1) echo "class='clickable-row-g clickable-row'";
                            else  echo "class='clickable-row-r clickable-row'"; ?> id="<?php echo $r['id'] ?>" data-href='product-details.php?id=<?php echo $r['id'] ?>'>
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
                        </tr>
                    <?php endforeach;  ?>
                </table>
            <?php } ?>
        </div>
    </div>
    <script>
        jQuery(document).ready(function($) {
            $(".clickable-row").click(function() {
                var idd = $(this).closest('tr').attr('id');
                document.getElementById("idg1").style.display = "block";
                $('#sub').click(function() {
                    var quantite = $('#q').val();
                    if (quantite >= 1) {
                        $.get("../config/stock.php?id=" + idd + "&q=" + quantite, function(data, status) {
                            if (status == 'success') {
                                alert("LE STOCK A ETE MaJ AVEC SUCCES");
                                $('#q').val(1)
                                document.getElementById("idg1").style.display = "none";
                                window.location = window.location;
                            }
                        });
                    }
                    else
                    alert("veuillez selectionner un quantite valide");
                });
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
    </style>



    <div id="idg1" class="modal">
        <div class="modal-content animate" action="" method="post">
            <div class="imgcontainer">
                Quantite <input type="number" id="q" min='1' required> <br> <br>
                type :
                <select name="type" id="" required>
                    <option value="" selected></option>
                    <option value="entree_stock">Arrivage</option>
                    <option value="retour">Retour</option>
                </select> <br> <br>
                <button id="sub" class="button">terminer</button>
            </div>
        </div>

    </div>
    <script>
        var modalg1 = document.getElementById('idg1');

        window.onclick = function(event) {
            if (event.target == modalg1) {
                modalg1.style.display = "none";
            }
        }
    </script>
    <style>
        input[type=email],
        input[type=password] {
            width: 100%;
            padding: .5em 1em;
        }

        .modal {
            overflow-y: scroll;
            overflow-x: hidden;
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            /* overflow: auto; */
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto 15% auto;
            /* 5% from the top, 15% from the bottom and centered */
            border: 1px solid #888;
            width: 35%;
            /* Could be more or less, depending on screen size */
        }

        .modal-content1 {
            background-color: #fefefe;
            margin: 5% auto 15% auto;
            /* 5% from the top, 15% from the bottom and centered */
            border: 1px solid #888;
            width: 50%;
            /* Could be more or less, depending on screen size */
        }

        .close {
            position: absolute;
            right: 25px;
            top: 0;
            color: #000;
            font-size: 35px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: red;
            cursor: pointer;
        }

        /* Add Zoom Animation */
        .animate {
            -webkit-animation: animatezoom 0.6s;
            animation: animatezoom 0.6s
        }

        @-webkit-keyframes animatezoom {
            from {
                -webkit-transform: scale(0)
            }

            to {
                -webkit-transform: scale(1)
            }
        }

        @keyframes animatezoom {
            from {
                transform: scale(0)
            }

            to {
                transform: scale(1)
            }
        }

        .imgcontainer {
            text-align: center;
            margin: 24px 0 12px 0;
            position: relative;
        }

        img.avatar {
            width: 40%;
            border-radius: 50%;
        }

        .container {
            padding: 16px;
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
</body>

</html>