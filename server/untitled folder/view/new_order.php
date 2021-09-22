<?php
 include     '../controller/connect_db.php';

$id_order = $_GET['i_o'];
$s = $_POST['code_bare'];


if($_FILES['webcam']['type'] == "image/jpeg")
{
    move_uploaded_file($_FILES['webcam']['tmp_name'], "../img/$s.jpg");
    $path= "../img/$s.jpg";
    #####################################################  MERGE  ############################################

    ###########################################################################################################
}

if($_FILES['webcam']['type'] == "image/png")
{
    move_uploaded_file($_FILES['webcam']['tmp_name'], "../img/$s.png");
    $path= "../img/$s.png";
}







/* echo "code barre" . $_POST['code_bare'] . "<br>";
echo "noom" . $_POST['product_name'] . "<br>";
echo "img" . $path . "<br>";
echo "p a " . $_POST['prix_achat'] . "<br>";
echo "p v" . $_POST['prix_vente'] . "<br>";
echo "merge " . $_POST['marge'] . "<br>";
echo "q" . $_POST['quantite'] . "<br>";
echo "q q" . $_POST['quantite'] . "<br>"; */




$req = $bdd->prepare('INSERT INTO products(id_order, code_bare, nom, `image`, prix_achat, prix_vente, marge, quantite, quantite_actuelle, `description`) VALUES(:id_o, :code_b, :noom, :img, :p_a, :p_v, :m, :q, :q_a, :dess)');
$req->execute(array(
    'id_o' => $id_order,
    'code_b' => $_POST['code_bare'],
    'noom' => $_POST['product_name'],
    'img' => $path,
    'p_a' => $_POST['prix_achat'],
    'p_v' => $_POST['prix_vente'],
    'm' => $_POST['marge'],
    'q' => $_POST['quantite'],
    'q_a' => $_POST['quantite'],
    'dess' => $_POST['description'],
));





$j = $_GET['pn'] - 1; 
if($j == -1)
{
?>
    <script>
    alert("all ur product have seccc added!");
    document.location.href = '../view/admin.php' ;
    </script>

<?php
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>App</title>
	

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
			<a class="navbar-brand" href="../view/admin.php">App ( admin mode )</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

        </nav>









<!-- ==========================================================================================================
													   APP
		 ========================================================================================================== -->

		 <div class="new">
            <form action="../view/new_order.php?pn=<?php echo $j?>&i_o=<?php echo $id_order?>" method='post' enctype='multipart/form-data'>
                <input type="hidden" name="id_order">
                <input type="text" name="product_name" placeholder="product name" required><br>
                <input type="file" name="webcam" accept="image/*"><br>
                <input type="text" name="prix_achat" placeholder="prix achat"><br>
                <input type="text" name="prix_vente" placeholder="prix vente" required><br>
                <input type="text" name="marge" placeholder="marge"><br>
                <input type="text" name="quantite" placeholder="quantite" required><br>
                <textarea name="description" cols="30" rows="10"></textarea><br>
                <input type="text" name="code_bare" placeholder="scan code bare" required><br>
                <input type="submit" value="<?php if($j != '0') echo "Next"; else echo"Finish";?>">
            </form>
		</div>
		









		<div class="exit">
        <a href="../controller/exit.phpl" id="a11">exit</a>
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