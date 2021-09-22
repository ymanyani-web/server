
<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=cafe;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
if(isset($_POST['password'])){
    #echo "<script>alert('good')</script>";
    $pswd = $_POST['password'];
    date_default_timezone_set('Africa/Casablanca');
    $dd = date("Y-m-d H:i");
    $categories = $bdd->query("SELECT * FROM personnel WHERE `password` = '$pswd'");
    $personnel = $categories->fetch();
    $nom = $personnel['nom'];
    $service = $bdd->query("SELECT * FROM `service` WHERE nom_personnel = '$nom' ORDER BY id DESC LIMIT 1");
    $ss = $service->fetch();
    echo $ss['nom_personnel'];
    if($ss['date_fin'] == "0001-01-01 01:01:00"){
        $c = $bdd->query("UPDATE `service` SET date_fin = '$dd' WHERE nom_personnel = '$nom' ORDER BY id DESC LIMIT 1");
        header('Location: ../index.php?msg=11');
    }
    else{
        header('Location: ../index.php?error=11');
    }
}

?>





<!DOCTYPE HTML>

<html>
	<head>
		<title>cafe</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="../assets/css/main.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet"> <!-- https://fonts.google.com/ -->
        <link rel="stylesheet" href="../fontawesome/css/all.min.css"> <!-- https://fontawesome.com/ -->
        <link rel="stylesheet" href="../assets/css/templatemo-ocean-vibes.css">

        
	</head>
	<body>
		<div class="page-wrap">

			<!-- Nav -->
            <?php include("../includes/menu1.html"); ?>

			<!-- Main -->
				<section id="main">

					<!-- Header -->
						<header id="header">
							<div><span>Cafe</span></div>
						</header>

					<!-- Section -->
                        <div>
                            <form action="" method="post">
                                <input type="password" name="password">
                                <input type="submit">
                            </form>
                        </div>
                    
		</div>

	</body>
</html>