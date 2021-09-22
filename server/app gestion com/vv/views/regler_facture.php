<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=gestion;charset=utf8', 'root', 'root');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
$list1 = $pdo->query("SELECT * FROM client");
if (isset($_POST['idcl'])) {
    $idcl = $_POST['idcl'];
    $list2 = $pdo->query("SELECT * FROM operation_tt WHERE id_client = $idcl");
    $reponse1 = $pdo->query("SELECT SUM(montant_d) AS `montant_d` FROM reglements WHERE id_client = $idcl");
    $donnes1 = $reponse1->fetch();
    $total_d = $donnes1['montant_d'];
    $reponse2 = $pdo->query("SELECT SUM(total) AS `tt` FROM operation_tt WHERE id_client = $idcl");
    $donnes2 = $reponse2->fetch();
    $total = $donnes2['tt'];
    $credit = $total - $total_d;
    $ccc = $pdo->query("SELECT nom, numero FROM client WHERE id = $idcl");
    $donnes3 = $ccc->fetch();
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
                    <h2>Regler une facture</h2>
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
    <div class="booking" style="margin-bottom: 0px;">
        <div class="booking-form">
            <center>
                <form action="#" method="post">
                    <select name="idcl" id="" class="butto">
                        <option value=""> Selectionner un client
                            <?php foreach ($list1 as $l1) {
                                $cl_id = $l1['id'];
                                $cl_nm = $l1['nom'];
                                echo "<option value='$cl_id'> $cl_nm";
                            }
                            ?>
                    </select>
                    <input type="submit" value="envoyer" class="button">
                </form>
            </center>
        </div>
    </div>
    <!-- Booking End -->

    <div id="cont">
        <div id="first">
            <h2>Nom: <?= $donnes3['nom'] ?></h2>
            <h2>Numero tel: <?= $donnes3['numero'] ?></h2>
        </div>
        <div id="second">
            <h1>Credit:
                <?php
                $credit = number_format($credit, 2, '.', '');
                if ($credit > 0)
                    echo "<span style='color: red; font-size:50px;'>- $credit DH</span>";
                elseif ($credit == 0)
                    echo "<span style='color: green; font-size:50px;'>0 DH</span>";
                else
                    echo "il y a un erreur veuillez nous contacter";
                ?>
            </h1>
        </div>
    </div>

    <div style="margin: auto; margin-bottom: 50px; width: 100%">
        <table class="taaaable table-bordered" id="table_abc" style="width: 80%; margin: auto; margin-top: 20px;">
            <tr>
                <th style="width: 19%;">Numero de facture</th>
                <th style="width: 27%;">total a payer</th>
                <th style="width: 27%;">montant donne</th>
                <th style="width: 27%;">Reste</th>
            </tr>
            <?php foreach ($list2 as $l2) :
            $idfc = $l2['id_facture'];
            $r9 = $pdo->query("SELECT SUM(montant_d) AS 'md' FROM reglements WHERE id_facture= $idfc");
            $ttd = $r9->fetch();
            ?>
                <tr <?php if (($l2['total'] - $ttd['md']) == 0) echo "class='clickable-row-g clickable-row'";
                    else echo "class='clickable-row-r clickable-row'";  ?> onclick=" window.x = <?php echo $l2['id_facture'] ?> ">
                    <td><?= $l2['id_facture'] ?></td>
                    <td><?= $l2['total'] ?></td>
                    <td><?php
                        echo $ttd['md'];
                        ?></td>
                    <td><?php
                        if (($l2['total'] - $ttd['md']) == 0)
                            echo "regle";
                        else
                            echo $l2['total'] - $ttd['md'];
                        ?></td>
                </tr>
            <?php
            endforeach;
            ?>
        </table>
    </div>


    <style>
        .clickable-row-g:hover {
            background-color: #a9dfbf;
        }

        .clickable-row-r:hover {
            background: #f5b7b1;
        }
    </style>
    <script>
        jQuery(document).ready(function($) {
            $(".clickable-row").click(function() {
                window.location.replace('regler_facture_details.php?id_f=' + window.x);
            });
        });
    </script>






    <div id="idg1" class="modal">
        <form class="modal-content animate" style="width: 50%;" method="post" action="../config/finish_command.php">
            <div class="imgcontainer">
                <span onclick="document.getElementById('idg1').style.display='none'" class="close" title="Close Modal">&times;</span>
                Montant : <input type="number" name="montant" placeholder="le montant donne"> DH<br><br>
                <input class="cart" id="<?php echo $r['id'] ?>" type="submit" value="terminer">
            </div>
        </form>
    </div>
    <style>
        #cont {
            width: 100%;
            overflow: hidden;
            border: solid black 2px;
        }

        #first {
            width: 70%;
            float: left;
        }

        #second {
            width: 29%;
            overflow: hidden;

        }
    </style>
    <script>
        var modalg1 = document.getElementById('idg1');

        window.onclick = function(event) {

            if (event.target == modalg1) {
                modalg1.style.display = "none";
            }

        }
    </script>
</body>