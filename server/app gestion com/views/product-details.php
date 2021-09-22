<?php
if(isset($_GET['id'])){
$idd = $_GET['id'];
}
else{
    echo "not good";
    exit;
}

try {
    $bdd = new PDO('mysql:host=localhost;dbname=gestion;charset=utf8', 'root', 'root');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
$response = $bdd->query('SELECT * FROM `products` WHERE id = '. $idd .';');
$products = [];
while($row = $response->fetch()){
?>
    <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <link rel="stylesheet" href="../assets/css/index.css">
    <link rel="stylesheet" href="../assets/css1/templatemo-ocean-vibes.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css"> <!-- https://fontawesome.com/ -->
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet"> <!-- https://fonts.google.com/ -->
    <title>????????????</title>
</head>
<body>
<header>
        <a href="../index.php">
            <h1>app logo</h1>
        </a>

    </header>
    <h1><?php echo $row['designation']; ?></h1>
    <img src="../<?php echo $row['image']; ?>" alt="" width="20%" height="20%"> <br>
    <span><?php echo $row['description']; ?></span> <br>
    <span>prix unitaire : <?php echo $row['pu']; ?></span> <br>
    <span> quantite: <?php echo $row['quantite']; ?></span>
</body>
</html>


<?php
}
?>