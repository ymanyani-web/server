<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=gestion;charset=utf8', 'root', 'root');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
if (isset($_POST['nom'])) {
    $nom = isset($_POST['nom']) ? $_POST['nom'] : "";
    $cin = isset($_POST['cin']) ? $_POST['cin'] : "";
    $rib = isset($_POST['rib']) ? $_POST['rib'] : "";
    $numero = isset($_POST['numero']) ? $_POST['numero'] : "";
    $adresse = isset($_POST['adresse']) ? $_POST['adresse'] : "";


    $req = $bdd->prepare('INSERT INTO client(nom, cin, rib, numero, adresse) VALUES(:n, :c, :r, :nm, :a)');
    $req->execute(array(
        'n' => $nom,
        'c' => $cin,
        'r' => $rib,
        'nm' => $numero,
        'a' => $adresse
    ));
    if ($_GET['path'] == 2)
        header('location: ../views/client.php?g=1');
    else
        header('location: ../admin.php?g=1');
}
echo 'erreuur//// veuillez contacter yazid';
?>

<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../assets/css/index.css">
    <link rel="stylesheet" href="../assets/css1/templatemo-ocean-vibes.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css"> 
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet"> 
    <title>????????????</title>
</head>

<body>
    <header>
        <a href="../index.php">
            <h1>app logo</h1>
        </a>
    </header>
    <div>
        <form action="#" method="post">
            <label for="nom">nom et prenom</label>
            <input type="text" name="nom" id="nom" required> <br>
            <label for="cin">cin</label>
            <input type="text" name="cin" id="cin"> <br>
            <label for="numero">numero</label>
            <input type="text" name="numero" id="numero"> <br>
            <label for="rib">adresse</label>
            <input type="text" name="adresse" id="adresse"> <br>
            <label for="rib">rib</label>
            <input type="text" name="rib" id="rib"> <br>
            <input type="submit" value="ajouter">
        </form>
    </div>
</body> -->