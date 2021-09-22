<?php
include     '../controller/connect_db.php';


?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>App </title>
	

	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Bootstrap  -->
	<link rel="stylesheet" href="../css/bootstrap.css">
	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="../css/owl.carousel.css">
	<link rel="stylesheet" href="../css/owl.theme.default.min.css">
	<!-- Animate.css -->
	<link rel="stylesheet" href="../css/animate.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

	<!-- Theme style  -->
    <link rel="stylesheet" href="../css/style.css">
    
	<!-- My style  -->
	<link rel="stylesheet" href="../css/my.css">

</head>
<body>


<div id="page-wrap">


	<!-- ==========================================================================================================
													   MENU
		 ========================================================================================================== -->

	<div id="fh5co-hero-wrapper">
		<nav class="container navbar navbar-expand-lg main-navbar-nav navbar-light">
			<a class="navbar-brand" href="admin.php">App( admin mode )</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				
				
			</div>
        </nav>









    <div>
        <form action="#" method="POST">
            <label for="start">Start month:</label>
            <input type="month" id="start" name="mois" required>
            <input type="submit">
        </form>
    </div>

    <?php
    $mois_start = $_POST['mois']."-01 00:00:00";
    $mois_end = $_POST['mois']."-31 23:59:59";
    $reponse = $bdd->query("SELECT * FROM prdcts_vendu WHERE `time`>='$mois_start' AND `time`<='$mois_end' "); 
    
    
    $reponse1 = $bdd->query("SELECT SUM(prix_vente) AS `total1` FROM prdcts_vendu WHERE `time`>='$mois_start' AND `time`<='$mois_end'");
    $donnes1 = $reponse1->fetch();
    $g1 = $donnes1['total1'];


    $reponse2 = $bdd->query("SELECT SUM(prix_achat) AS `total2` FROM prdcts_vendu WHERE `time`>='$mois_start' AND `time`<='$mois_end'");
    $donnes2 = $reponse2->fetch();
    $g2 = $donnes2['total2'];


   $gaain = $g1 - $g2;


   ?>
   <div style="text-align: center; font-size: 25px;}">
    
   <p>Total de gain du mois <?php echo $_POST['mois'] ?> est : <font size="10" face="verdana" color="red"><?php echo $gaain; ?> MAD</font></p>

   </div>
   
        <table class="taaaable">
            <tr>
                <th>nom</th>
                <th>quantite</th>
                <th>Prix de vente</th>
                <th>Prix d'achat</th>
                <th>Seller</th>
                <th>Time</th>
            </tr> 
        <?php  foreach ($reponse as $r):  ?>
            <tr>
                <td><?php echo $r['nom'] ?></td>
                <td><?php echo $r['quantite'] ?></td>
                <td><?php echo $r['prix_vente']." dh" ?></td>
                <td><?php echo $r['prix_achat']." dh" ?></td>
                <td><?php echo $r['seller'] ?></td>
                <td><?php echo $r['time'] ?></td>
            </tr> 
        <?php  endforeach;  ?>

        </table>


        <div class="exit">
        <a href="../controller/exit.php" id="a11">exit</a>
    </div>
    <style>
    .exit{
        position: fixed;
        right: 15px;
        bottom: 10px;
        font-size: 20px;
    }
    #a11{
        color: red; 

    }
    </style>