<?php
session_start();

if(!empty($_POST['code']))
{
    $code = $_POST['code'];
    include     '../controller/connect_db.php';
    
    $reponse = $bdd->query("SELECT * FROM products WHERE code_bare='$code'");
    $donnes = $reponse->fetch();
}
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
			<a class="navbar-brand" href="">App</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav nav-items-center ml-auto mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item  active">
						<a class="nav-link" href="sell.php">Sell</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="log.php" >Admin</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#" >Download</a>
					</li>
				</ul>
				<div class="social-icons-header">
					<a href="https://www.facebook.com/fh5co"><i class="fab fa-facebook-f"></i></a>
					<a href="https://freehtml5.co"><i class="fab fa-instagram"></i></a>
					<a href="https://www.twitter.com/fh5co"><i class="fab fa-twitter"></i></a>
				</div>
			</div>
        </nav>
        

        	<!-- ==========================================================================================================
													   APP
         ========================================================================================================== -->
         

    <div class="info">
        <div id="info1">
            <h2> <?php echo $donnes['nom'] ?> </h2>
        </div>
        <div id="info2">
            <h3> <?php echo"Quantite: ";echo $donnes['quantite_actuelle'] ?> </h3>
        </div>
        <div id="info3">
            <h3> <?php echo $donnes['description'] ?> </h3>
        </div>
        <div id="info4">
            <h3> <?php echo"Prix: "; echo $donnes['prix_vente'] ?> dh </h3>
		</div>
    </div>

    <div class="pic">
        <img src="<?php echo $donnes['image']?>" id="immg">
    </div>

    <div class="sell">
        <form action="../controller/sell.php" method="post" style="text-align: right">
            <input type="hidden" value="<?php echo $donnes['code_bare'] ?>" name="c_b">
            <input type="hidden" value="<?php echo $donnes['prix_achat'] ?>" name="prix_a">
            <label for="price">Prix </label> <input type="text" name="prix"><br>
            <label for="q">Quantite </label> <input type="number" value="1" name="quantite" min="1" max="<?php echo $donnes['quantite_actuelle'] ?>"><br>
            <label for="p">Pin </label> <input type="password" name="pin"><br>
            PrintechPrintech<span><?php echo $donnes['marge'] ?></span>PrintechPrintech<br>
            <input type="submit" class="btn">

        </form>
    </div>

    <div class="code_b">
        <form action="" method="post">
            <input type="text" name="code" id="ccd"placeholder="Scan code barre" autofocus="autofocus">
            <input type="submit" id="qwe">
        </form>
    </div>