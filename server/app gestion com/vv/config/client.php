<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=gestion;charset=utf8', 'root', 'root');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
if (isset($_POST['nom'])) {
    $nom = isset($_POST['nom']) ? trim($_POST['nom']) : "";
    $cin = isset($_POST['cin']) ? trim($_POST['cin']) : "";
    $rib = isset($_POST['rib']) ? trim($_POST['rib']) : "";
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