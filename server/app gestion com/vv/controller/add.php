<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=gestion;charset=utf8', 'root', 'root');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
if (isset($_POST['nom'])) {
    $nom = isset($_POST['nom']) ? $_POST['nom'] : "";
    
    if($_GET['type'] == 1)
    {
        $req = $bdd->prepare('INSERT INTO categorie_piece(nom) VALUES(:n)');
        $req->execute(array(
            'n' => $nom,
        ));
    }
    if($_GET['type'] == 2)
    {
        $req = $bdd->prepare('INSERT INTO marque_vehicule(nom) VALUES(:n)');
        $req->execute(array(
            'n' => $nom,
        ));
    }
    if($_GET['type'] == 3)
    {
        $req = $bdd->prepare('INSERT INTO marque_piece(nom) VALUES(:n)');
        $req->execute(array(
            'n' => $nom,
        ));
    }
    header('location: ../settings.php');
}
?>