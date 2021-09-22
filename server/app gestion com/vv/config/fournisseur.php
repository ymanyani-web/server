<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=gestion;charset=utf8', 'root', 'root');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
if (isset($_POST['nom'])) {
    $nom = isset($_POST['nom']) ? trim($_POST['nom']) : "";
    $telephone = isset($_POST['telephone']) ? trim($_POST['telephone']) : "";
    $adresse = isset($_POST['adresse']) ? $_POST['adresse'] : "";
    $ville = isset($_POST['ville']) ? trim($_POST['ville']) : "";
    $email = isset($_POST['email']) ? trim($_POST['email']) : "";
    


    $req = $bdd->prepare('INSERT INTO fournisseur(nom, telephone, adresse, ville, email) VALUES(:n, :t, :a, :v, :e)');
    $req->execute(array(
        'n' => $nom,
        't' => $telephone,
        'a' => $adresse,
        'v' => $ville,
        'e' => $email
    ));
    header('Location: ../views/fournisseur.php?g=1');
}
?>