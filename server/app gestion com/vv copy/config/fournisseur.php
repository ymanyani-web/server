<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=gestion;charset=utf8', 'root', 'root');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
if (isset($_POST['nom'])) {
    $nom = isset($_POST['nom']) ? $_POST['nom'] : "";
    $telephone = isset($_POST['telephone']) ? $_POST['telephone'] : "";
    $adresse = isset($_POST['adresse']) ? $_POST['adresse'] : "";
    $ville = isset($_POST['ville']) ? $_POST['ville'] : "";
    $email = isset($_POST['email']) ? $_POST['email'] : "";
    


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

<!DOCTYPE html>
<html lang="en">


<!-- <body>
    <header>
        <a href="../index.php">
            <h1>app logo</h1>
        </a>
    </header>
    <div>
        <form action="#" method="post">
            <label for="nom">nom et prenom</label>
            <input type="text" name="nom" id="nom" required> <br>
            <label for="telephone">telephone</label>
            <input type="text" name="telephone" id="telephone"> <br>
            <label for="adresse">adresse</label>
            <input type="text" name="adresse" id="adresse"> <br>
            <label for="ville">ville</label>
            <input type="text" name="ville" id="ville"> <br>
            <label for="email">email</label>
            <input type="email" name="email" id="email"> <br>
            <input type="submit" value="ajouter">
        </form>
    </div>
</body> -->