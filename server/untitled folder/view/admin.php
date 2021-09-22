<?php
session_start();
if($_SESSION['role'] != "admin" && empty($_SESSION['user']))
{
    header('Location: ../view/log.php');
}
 include     '../controller/connect_db.php';
$reponse = $bdd->query('SELECT * FROM PRODUCTS ORDER BY ID DESC LIMIT 1');
$donnees = $reponse->fetch();
$id_order = $donnees['id_order'] + 1;
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
			<a class="navbar-brand" href="">App( admin mode )</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				
				
			</div>
        </nav>




        
<div>
    <div>
		<a onclick="myfunc()">New order</a>
		<a href="../view/retour.php">Return</a>
		<a href="../view/prd_vendu.php">statistic</a>
		<a href="../view/gain.php">gain par mois</a>
		<a href="../view/stock.php">stock</a>
    </div>
    <div>

    </div>
    <div>

    </div>
</div>






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








<script>
function myfunc()
{
    var num = prompt("how many products?")

    if(isNaN(num) || Math.sign(num)==-1 || Math.sign(num)==0)
    {
        alert("please enter a valid number!!!");
        myfunc();
    }
    else
    {
        console.log("ok");
        document.location.href = '../view/new_order.php?pn=' + num +'&i_o=<?php echo $id_order?>';

    }
}
</script>