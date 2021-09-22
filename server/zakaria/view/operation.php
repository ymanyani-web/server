<?php
session_start();
if(empty($_SESSION['user']))
{
	header('Location: ../index.php?msg=2');
}
if($_GET['msg'] == 11)
{
	echo "<script>alert('the information doesnt match try again')</script>";
}
?>

<!DOCTYPE html>
<html>
	<head>
	<script>
    if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
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
		<link href="../css/my.css" rel="stylesheet">
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="#">
		<style>
html {
  height: 100%;
}
body {
  margin:0;
  padding:0;
  font-family: sans-serif;
  background: linear-gradient(#0000, #FF8B00);
}
input[type=submit] {
    background-color: #FF8B00;
    border: none;
    color: white;
    padding: 14px 32px;
    text-decoration: none;
    margin: 4px 2px;
	cursor: pointer;
	border-radius: 8px;
	
  }
		</style>
	</head>
	
	
	
	
	
	
	
	
	<body>
		
	<div class="wrapper">
			<!-- banner -->
					<div class="banner-content">
						<!-- logo image -->
						<a href="index.php"><img class="img-responsive" src="../img/logo.png" alt="" /></a>
					</div>
          <div class="langue">
            <a href="../view/operation.php?lg=1">عربي | </a>
            <a href="../view/operation.php">Français</a>
          </div>
			</div>



<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=zakaria;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
$reponse = $bdd->query("SELECT * FROM clients");
$repons = $bdd->query("SELECT * FROM clients");
if(!empty($_GET['id'])){
	$id = $_GET['id'];
	$reponse1 = $bdd->query("SELECT * FROM clients WHERE id = '$id'");
	$donnees = $reponse1->fetch();
	$nomm = $donnees['nom'];
	$cinn = $donnees['cin'];
}
?>



<div class="login-box">
	<h2>Entrer les informations necessaire pour continuez</h2>
	<form action="../controller/aod.php" method="post">
	<div class="user-box">
		<input list="nom22" name="nom" id="input" <?php if(!empty($nomm)) { echo "value='$nomm'"; }?> required>
				<datalist id="nom22" >
					<?php  foreach ($reponse as $r):
						$nom = $r['nom']; 
						$id = $r['id'];
						echo "<option id='$id' value='$nom'>";
						endforeach;
					?>
				</datalist>
		<label>Nom et prenom</label>
    </div>



    

	<div class="user-box">
		<input list="nom222" name="cin" id="input10" <?php if(!empty($cinn)) { echo "value='$cinn'"; }?> >
		<datalist id="nom222" >
			<?php  foreach ($repons as $rr):
				$cin = $rr['cin']; 
				$iid = $rr['id'];
				echo "<option id='$iid' value='$cin'>";
				endforeach;a
			?>
		</datalist>
		<label>C.I.N</label>
	</div>

	<div class="user-box">
		<input type="number" name="mad" required>
		<label>Montant</label>
	</div>

	<div class="user-box">
		<input type="radio" id="debit" name="operation" value="debit" required>
		<label for="debit">debit</label>
	</div>
	<div class="user-box">
		<input type="radio" id="credit" name="operation" value="credit" required>
		<label >credit</label>
	</div>

  <div class="user-box">
		<input type="text" name="libele" >
		<label>libele</label>
	</div>
	


		<input type="submit" value="envoyer" id="sub">
	</form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script>
$(function(){
    $('#input').change(function(){
        var t = $("#nom22 option[value='" + $('#input').val() + "']").attr('id');
        if(t == undefined)
        {
			document.getElementById('id011').style.display = "block";
            $( "#sub" ).prop( "disabled", true );
        }
        else{
			location.replace("operation.php?id=" + t + "");
            $( "#sub" ).prop( "disabled", false );
        }
    });
});

$(function(){
    $('#input10').change(function(){
        var t = $("#nom222 option[value='" + $('#input10').val() + "']").attr('id');
        if(t == undefined)
        {
			document.getElementById('id01').style.display = "block";
            $( "#sub" ).prop( "disabled", true );
        }
        else{
			location.replace("operation.php?id=" + t + ""); 
            $( "#sub" ).prop( "disabled", false );
        }
    });
});



</script>





<div id="id01" class="modal">
  <form class="modal-content animate" action="/action_page.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
	  <img src="../img/dd.png" alt="Avatar" class="avatar">
	  <h3>Pas d'utilisateure avec ce cin</h3>
    </div>
  </form>
</div>

<div id="id011" class="modal">
  <form class="modal-content animate" action="/action_page.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id011').style.display='none'" class="close" title="Close Modal">&times;</span>
	  <img src="../img/dd.png" alt="Avatar" class="avatar">
	  <h3>Pas d'utilisateure avec ce nom</h3>
    </div>
  </form>
</div>

<script>

var modal1 = document.getElementById('id01');
var modal11 = document.getElementById('id011');

window.onclick = function(event) {
    if (event.target == modal1) {
        modal1.style.display = "none";
    }
    if (event.target == modal11) {
        modal11.style.display = "none";
    }
}
</script>
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
