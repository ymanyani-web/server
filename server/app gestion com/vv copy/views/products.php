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
    <title>Burger King - Food Website Template</title>
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
            <a href="../index.php" class="navbar-brand">Habib <span>society</span></a>
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
                    <span style=""><input type="submit" value="chercher"></span>
                </form>
            </center>
        </div>
        <!-- <div class="">
            <div class="">

                <div class="">
                    <div class="booking-form">
                        <form>
                            <div class="control-group">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Name" required="required" />
                                    <div class="input-group-append">
                                        <div class="input-group-text"><i class="far fa-user"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="input-group">
                                    <input type="email" class="form-control" placeholder="Email" required="required" />
                                    <div class="input-group-append">
                                        <div class="input-group-text"><i class="far fa-envelope"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Mobile" required="required" />
                                    <div class="input-group-append">
                                        <div class="input-group-text"><i class="fa fa-mobile-alt"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="input-group date" id="date" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" placeholder="Date" data-target="#date" data-toggle="datetimepicker" />
                                    <div class="input-group-append" data-target="#date" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="input-group time" id="time" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" placeholder="Time" data-target="#time" data-toggle="datetimepicker" />
                                    <div class="input-group-append" data-target="#time" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="far fa-clock"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="input-group">
                                    <select class="custom-select form-control">
                                        <option selected>Guest</option>
                                        <option value="1">1 Guest</option>
                                        <option value="2">2 Guest</option>
                                        <option value="3">3 Guest</option>
                                        <option value="4">4 Guest</option>
                                        <option value="5">5 Guest</option>
                                        <option value="6">6 Guest</option>
                                        <option value="7">7 Guest</option>
                                        <option value="8">8 Guest</option>
                                        <option value="9">9 Guest</option>
                                        <option value="10">10 Guest</option>
                                    </select>
                                    <div class="input-group-append">
                                        <div class="input-group-text"><i class="fa fa-chevron-down"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button class="btn custom-btn" type="submit">Book Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
    <!-- Booking End -->

    <div style="margin: auto; margin-bottom: 50px;">
        <div >
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
                        <tr class='clickable-row' data-href='product-details.php?id=<?php echo $r['id'] ?>'>
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
                            <!-- <td> <?php/*  echo $r['quantite_global'] */ ?> </td> -->
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
        .taaaable{
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
</body>

</html>