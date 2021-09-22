<?php
session_start();
if(empty($_SESSION['user']))
{
	header('Location: ../index.php?msg=2');
}
if(empty($_SESSION['user']))
{
	header('Location: ../index.php?msg=2');
}
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=zakaria;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
$today_end = date("Y-m-d") . " 23:59:59";
$today_start = date("Y-m-d") . " 00:00:00";
//echo $today;

$reponse1 = $bdd->query("SELECT SUM(credit) AS `credit` FROM client WHERE temps <= '$today_end' AND temps >= '$today_start'");
$donnes1 = $reponse1->fetch();
$g1 = $donnes1['credit'];
$reponse2 = $bdd->query("SELECT SUM(debit) AS `debit` FROM client WHERE temps <= '$today_end' AND temps >= '$today_start'");
$donnes2 = $reponse2->fetch();
$g2 = $donnes2['debit'];
$total = $g2 - $g1;

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Lapsus - Website Landing Page</title>
		<!-- Description, Keywords and Author -->
		<meta name="description" content="Your description">
		<meta name="keywords" content="Your,Keywords">
		<meta name="author" content="ResponsiveWebInc">
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- Styles -->
		<!-- Bootstrap CSS -->
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<!-- Font awesome CSS -->
		<link href="../css/font-awesome.min.css" rel="stylesheet">		
		<!-- Custom CSS -->
		<link href="../css/style.css" rel="stylesheet">
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="#">
	</head>
	
	<body>
		<?php
		if($_GET['msg'] == '1')
		{
			echo "<body onload='document.getElementById(\"id01\").style.display=\"block\"' style='width:auto;'>";
		}
		if($_GET['msg'] == '11')
		{
			echo "<body onload='document.getElementById(\"id011\").style.display=\"block\"' style='width:auto;'>";
		}
		if($_GET['msg'] == '111')
		{
			echo "<body onload='document.getElementById(\"id0111\").style.display=\"block\"' style='width:auto;'>";
		}
		if($_GET['msg'] == '1111')
		{
			echo "<body onload='document.getElementById(\"id01111\").style.display=\"block\"' style='width:auto;'>";
		}
		if($_GET['msg'] == '11111')
		{
			echo "<body onload='document.getElementById(\"id011111\").style.display=\"block\"' style='width:auto;'>";
		}
		if($_GET['msg'] == '111111')
		{
			echo "<body onload='document.getElementById(\"id0111111\").style.display=\"block\"' style='width:auto;'>";
		}
		?>
		<!-- wrapper -->
		<div class="wrapper">
			<div class="langue">
				<a href="index.php?lg=1">عربي | </a>
				<a href="index.php">Français</a>
			</div>
			<!-- banner -->
			<div class="banner">
				<div class="container">
				<div class="solde">
				
					<?php
					$total = number_format($total, 2);
					if($total >= 0)
					{
						if($_GET['lg']==1)
							echo "<p>:رصيدك اليوم هو </p> <font size='12' color='green'>" . $total . " Dh</font>";
						else
							echo "<p>Votre Solde pour aujourd\'hui est de:</p> <font size='12' color='green'>" . $total . " Dh</font>";
					}
					if($total < 0)
					{
						if($_GET['lg']==1)
							echo "<p>:رصيدك اليوم هو </p> <font size='12' color='red'>" . $total . " Dh</font>";
						else
							echo "<p>Votre Solde pour aujourd\'hui est de:</p> <font size='12' color='red'>" . $total . " Dh</font>";
					}
						/* if($_GET['lg']==1)
							echo '<p>:رصيدك اليوم هو <h1>' . $total . ' Dh</h1></p>';
						else
							echo '<p>Votre Solde pour aujourd\'hui est de: <h1>' . $total . ' Dh</h1></p>'; */
					?>
				</div>
					<!-- banner content -->
					<div class="banner-content" style="margin-left: 660px;" >
						<!-- logo image -->
						<a href="#"><img class="img-responsive" src="../img/logo.png" alt="" /></a>
						<!-- short paragraph -->
						<?php
						if($_GET['lg']==1)
							echo '<p style="color:black;">تسير لعلاقات زبائنية</p>';
						else
							echo '<p style="color:black;">Gestion de la relation client.</p>';
						?>
						<!-- button link -->
						<?php
						if($_GET['lg']==1)
							echo '<a href="../controller/log-out.php" class="btn btn-info btn-lg">تسجيل لخروج</a>';
						else
							echo '<a href="../controller/log-out.php" class="btn btn-info btn-lg">Deconnexion</a>';
						?>
					</div>
				</div>
			</div>
			
			<!-- feature block -->
			<div class="feature">
				<div class="container">
					<div class="row">
						<div class="col-md-4 col-sm-4">
							<!-- feature item -->
							<div class="feature-item">
								<!-- icon -->
								<a href="operation.php"><i class="fa fa-exchange"></i></a>
								<!-- heading -->
								<?php
								if($_GET['lg']==1)
									echo '<h4>عمليات</h4>';
								else
									echo '<h4>Operations</h4>';
								?>
								<!-- paragraph -->
								<?php
								if($_GET['lg']==1)
									echo '<p>الائتمان أو الخصم</p>';
								else
									echo '<p>Credit ou debit</p>';
								?>
							</div>
						</div>
						<div class="col-md-4 col-sm-4">
							<!-- feature item -->
							<div class="feature-item">
								<!-- icon -->
								<a href="releve.php"><i class="fa fa-user"></i></a>
								<!-- heading -->
								<?php
								if($_GET['lg']==1)
									echo '<h4>استشارة حالة العميل</h4>';
								else
									echo '<h4>Consultation état client</h4>';
								?>
								<!-- paragraph -->
								<?php
								if($_GET['lg']==1)
									echo '<p>استشارة التوازن</p>';
								else
									echo '<p>Consulter solde</p>';
								?>
							</div>
						</div>
						<div class="col-md-4 col-sm-4">
							<!-- feature item -->
							<div class="feature-item">
								<!-- icon -->
								<a href="new-c.php"><i class="fa fa-plus"></i></a>
								<!-- heading -->
								<?php
								if($_GET['lg']==1)
									echo '<h4>زبون جديد</h4>';
								else
									echo '<h4>Nouveau client</h4>';
								?>
								<!-- paragraph -->
								<?php
								if($_GET['lg']==1)
									echo '<p>إنشاء حساب لعميل جديد</p>';
								else
									echo '<p>creer un compte pour un nouveau client</p>';
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
			

			
			<!-- footer -->
			<footer>
				<div class="container">
					<!-- navigation link -->
					<p class="nav-link"><a href="#">Contact</a> &nbsp;|&nbsp; <a href="#">Downloads</a> &nbsp;|&nbsp; <a href="#">Email</a> &nbsp;|&nbsp; <a href="#">Support</a> &nbsp;|&nbsp; <a href="#">Privacy Policy</a></p>
					<!-- copy right -->
					<!-- This theme comes under Creative Commons Attribution 4.0 Unported. So don't remove below link back -->
					<p class="copy-right">Copyright &copy; 2014 <a href="#">Your Site</a> | Designed By : <a href="http://www.indioweb.in/portfolio">IndioWeb</a>, All rights reserved. </p>
				</div>
				<div>
					<?php
						if($_GET['lg']==1)
							echo '<a href="fin.php" class="btn btn-info btn-lg">تسجيل لخروج</a>';
						else
							echo '<a href="fin.php" class="btn btn-info btn-lg">Fin de journée</a>';
					?>
					<?php
						if($_GET['lg']==1)
							echo '<a href="rapport.php" class="btn btn-info btn-lg">تسجيل لخروج</a>';
						else
							echo '<a href="rapport.php" class="btn btn-info btn-lg">Rapport personalise</a>';
					?>
				</div>
			</footer>
			
		</div>
		
		
		<!-- Javascript files -->
		<!-- jQuery -->
		<script src="js/jquery.js"></script>
		<!-- Bootstrap JS -->
		<script src="js/bootstrap.min.js"></script>
		<!-- Respond JS for IE8 -->
		<script src="js/respond.min.js"></script>
		<!-- HTML5 Support for IE -->
		<script src="js/html5shiv.js"></script>
		<!-- Custom JS -->
		<script src="js/custom.js"></script>
	</body>	



<style>
/* Center the image and position the close button */
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

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 35%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
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
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

</style>





<div id="id01" class="modal">
  <form class="modal-content animate" action="/action_page.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
	  <img src="../img/error.png" alt="Avatar" class="avatar">
	  <h3>l'utilisateure a ete ajoute</h3>
    </div>
  </form>
</div>


<div id="id011" class="modal">
  <form class="modal-content animate" action="/action_page.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id011').style.display='none'" class="close" title="Close Modal">&times;</span>
	  <img src="../img/error.png" alt="Avatar" class="avatar">
	  <h3>l'operation a ete ajoute</h3>
    </div>
  </form>
</div>


<div id="id0111" class="modal">
  <form class="modal-content animate" action="/action_page.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id0111').style.display='none'" class="close" title="Close Modal">&times;</span>
	  <img src="../img/error.png" alt="Avatar" class="avatar">
	  <h3>l'operation a ete modifie</h3>
    </div>
  </form>
</div>


<div id="id01111" class="modal">
  <form class="modal-content animate" action="/action_page.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01111').style.display='none'" class="close" title="Close Modal">&times;</span>
	  <img src="../img/error.png" alt="Avatar" class="avatar">
	  <h3>l'operation a ete suprime</h3>
    </div>
  </form>
</div>


<div id="id011111" class="modal">
  <form class="modal-content animate" action="/action_page.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id011111').style.display='none'" class="close" title="Close Modal">&times;</span>
	  <img src="../img/error.png" alt="Avatar" class="avatar">
	  <h3>l'utilisateure a ete modifie</h3>
    </div>
  </form>
</div>


<div id="id0111111" class="modal">
  <form class="modal-content animate" action="/action_page.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id0111111').style.display='none'" class="close" title="Close Modal">&times;</span>
	  <img src="../img/error.png" alt="Avatar" class="avatar">
	  <h3>l'utilisateure a ete suprime</h3>
    </div>
  </form>
</div>


<script>

var modal1 = document.getElementById('id01');
var modal11 = document.getElementById('id011');
var modal111 = document.getElementById('id0111');
var modal1111 = document.getElementById('id01111');
var modal11111 = document.getElementById('id011111');
var modal111111 = document.getElementById('id0111111');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal1) {
        modal1.style.display = "none";
    }
	if (event.target == modal11) {
        modal11.style.display = "none";
    }
	if (event.target == modal111) {
        modal111.style.display = "none";
    }
	if (event.target == modal1111) {
        modal1111.style.display = "none";
    }
	if (event.target == modal11111) {
        modal11111.style.display = "none";
    }
	if (event.target == modal111111) {
        modal111111.style.display = "none";
    }
}
</script>