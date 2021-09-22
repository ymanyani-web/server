
<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=cafe;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
$name = $_FILES['webcam']['name'];
move_uploaded_file($_FILES['webcam']['tmp_name'], "../img/$name");
$path= "../img/$name";



$categories = $bdd->query("SELECT * FROM categories");
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
                                <input list="category" name="category">
                                <datalist id="category">
                                    <?php foreach ($categories as $r):  ?>
                                        <option value="<?php echo $r['categorie'] ?>">
                                    <?php  endforeach;  ?> 
                                </datalist>
                               prix: <input type="number" name="prix" id=""> <br>
                               pic: <input type="file" id='upload' name="webcam" accept="image/*"> <br>
                               <input type="submit">
                           </form>
                        </div>
                    
		</div>

	</body>
</html>

<?php
if(!empty($_FILES['webcam']['name']))
{
    $req = $bdd->prepare('INSERT INTO products(nom, category, `prix`, img) VALUES(:n, :c, :p, :i)');
    $req->execute(array(
        'n' => $_POST['nom'],
        'c' => $_POST['category'],
        'p' => $_POST['prix'],
        'i' => $path,
    ));
    //echo '<script> window.location.replace("../view/settings.php");</script>';
}
?>