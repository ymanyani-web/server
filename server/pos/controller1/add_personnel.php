
<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=cafe;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
if(isset($_POST['nom'])){
    $nom = $_POST['nom'];
    $sql_u = "SELECT * FROM personnel WHERE nom='$nom'";
  	$sql_e = "SELECT * FROM users WHERE email='$email'";
  	$res_u = mysqli_query($db, $sql_u);
  	$res_e = mysqli_query($db, $sql_e);
    if (mysqli_num_rows($res_u) > 0)
    {
        $msg = "Sorry... username already taken, try again !";
        //echo "<script type='text/javascript'>alert('$message');</script>";
        require('../view/sign-up.php');
    }
    else if(mysqli_num_rows($res_e) > 0)
    {
        $msg = "Sorry... email already taken, try again !";
        require('../view/sign-up.php');
    }
    $req = $bdd->prepare('INSERT INTO personnel(nom, `role`, `password`) VALUES(:n, :r, :p)');
    $req->execute(array(
        'n' => $_POST['nom'],
        'r' => $_POST['role'],
        'p' => $_POST['password'],
    ));
}
?>





<!DOCTYPE HTML>

<html>
	<head>
		<title>Gallery</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="../assets/css/main.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <style>
        html, body, #main{
            height:100%;
            width:100%;
        }
	    </style>
	</head>
	<body>
		<div class="page-wrap">

			<!-- Nav -->
            <?php include("../includes/menu3.html"); ?>

			<!-- Main -->
				<section id="main">

					<!-- Header -->
						<header id="header">
							<div><span>Cafe</span></div>
						</header>

					<!-- Section -->
						<div>
                           <form action="#" method="post" enctype='multipart/form-data'>
                               name: <input type="text" name="nom" id=""> <br>
                                <input list="category" name="role">
                                <datalist id="category">
                                    <option value="waiter">waiter</option>
                                    <option value="gerant">gerant</option>
                                </datalist><br>
                               password: <input type="password" name="password" id=""> <br>
                               <input type="submit">
                           </form>
                        </div>
                    
		</div>

	</body>
</html>