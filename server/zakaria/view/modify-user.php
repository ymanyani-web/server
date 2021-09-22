<?php
session_start();
if(empty($_SESSION['user']))
{
	header('Location: ../index.php?msg=2');
}
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
		<link href="../css/my.css" rel="stylesheet">
		
		<!-- Favicon -->
    <link rel="shortcut icon" href="#">
    <script>
    if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
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
input[type=submit], [type=button] {
    background-color: #FF8B00;
    border: none;
    color: white;
    padding: 14px 32px;
    text-decoration: none;
    margin: 4px 2px;
	cursor: pointer;
	border-radius: 8px;
	
  }
#inp{
	  right: 0px;
	  bottom: 40px;
  }
  #sup{
	position: absolute;
    right: 36px;
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
            <a href="../view/modify-user.php?lg=1">عربي | </a>
            <a href="../view/modify-user.php">Français</a>
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
$iid = $_GET['id'];


$reponse = $bdd->query("SELECT * FROM clients WHERE id = $iid");
$donnees = $reponse->fetch();


/* $reponse4 = $bdd->query("SELECT * FROM clients WHERE id='$iid1'");
$r333 = $reponse4->fetch();
 */

?>



<div class="login-box">
	<h2>Entrer les informations necessaire pour continuez</h2>
	<form action="../controller/modify-user.php" method="post">
	<div class="user-box">
		<input list="nom22" name="nom" id="nom" value ="<?php echo $donnees['nom']?>" >
		<label>Nom et prenom</label>
    </div>

	<div class="user-box" >
		<input type="text" name="cin" id="username-m" value ="<?php echo $donnees['cin']?>">
		<label>C.I.N</label>
	</div>

	<div class="user-box">
		<input type="number" name="rib" value="<?php echo $donnees['rib']?>" oninput="maxLengthCheck(this)" maxlength = "24" minlength="24" >
		<label>RIB</label>
	</div>

	<input type="hidden" name="id" value="<?php echo $iid ?>">
    <input type="hidden" value="<?php echo $donnees['nom'] ?>" name="nom1">
    <input type="hidden" value="<?php echo $donnees['cin']?>" name="cin1">

<div id="inp">
<input type="submit" value="modifier">
</form>

<input type="button" id="sup" value="Suprimer" onclick="document.getElementById('id01').style.display = 'block'">

</div>		
	

<div>
</div>
</div>

<div id="id01" class="modal">
  <form class="modal-content animate" action="modify-user.php?id=<?php echo $iid?>" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
		<h3>Enter master password</h3>
		<input type="password" name="pswd">
		<input type="submit" name="">
    </div>
  </form>
</div>

<div id="id011" class="modal">
  <form class="modal-content animate" action="/action_page.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id011').style.display='none'" class="close" title="Close Modal">&times;</span>
	  <img src="../img/dd.png" alt="Avatar" class="avatar">
	  <h3>Master password incorrect</h3>
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



  // This is an old version, for a more recent version look at
  // https://jsfiddle.net/DRSDavidSoft/zb4ft1qq/2/
  function maxLengthCheck(object)
  {
    if (object.value.length > object.maxLength)
      object.value = object.value.slice(0, object.maxLength)
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

<?php
if(!empty($_POST['pswd']))
{
	if($_POST['pswd'] == '123456'){
		?>
		<script>location.replace("../controller/delete-user.php?id=<?php echo $iid?>");</script>
		<?php
	}
	else{
		?>
		<script>document.getElementById('id011').style.display = 'block'</script>
		<?php
	}
}