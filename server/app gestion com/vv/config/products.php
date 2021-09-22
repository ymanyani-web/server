<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=gestion;charset=utf8', 'root', 'root');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
$reponse1 = $bdd->query("SELECT * FROM categorie_piece");
$reponse2 = $bdd->query("SELECT * FROM marque_piece");
$reponse3 = $bdd->query("SELECT * FROM marque_vehicule");
$reponse4 = $bdd->query("SELECT * FROM fournisseur");
if (isset($_POST['ref'])) {
    $ref = isset($_POST['ref']) ? trim($_POST['ref']) : "";
    $designation = isset($_POST['designation']) ? trim($_POST['designation']) : "";
    $categorie_pieceId = isset($_POST['categorie_pieceId']) ? $_POST['categorie_pieceId'] : "";
    $marque_pieceId = isset($_POST['marque_pieceId']) ? $_POST['marque_pieceId'] : "";
    $marque_vehiculeId = isset($_POST['marque_vehiculeId']) ? $_POST['marque_vehiculeId'] : [];
    $casier = isset($_POST['casier']) ? trim($_POST['casier']) : "";
    $nn = $_FILES['profile']['name'];
    move_uploaded_file($_FILES['profile']['tmp_name'], "../images/$cb-$nn");
    $path =  "images/$cb-$nn";
    $path =  isset($path) ? "images/$cb-$nn" : "";
    $pu = isset($_POST['pu']) ? $_POST['pu'] : "";
    $remise = isset($_POST['remise']) ? $_POST['remise'] : "";
    $description = isset($_POST['description']) ? $_POST['description'] : "";

    $fournisseurId = isset($_POST['fournisseurId']) ? $_POST['fournisseurId'] : "";
    $pu_fournisseur = isset($_POST['pu_f']) ? $_POST['pu_f'] : "";

    $description = "\n" . $description . "compatible a: ";
    $marque1 = $marque_vehiculeId[0];
    foreach ($marque_vehiculeId as $marque) {
        $liist1 = $bdd->query("SELECT * FROM marque_vehicule WHERE id = $marque");
        $ll1 = $liist1->fetch();
        $l1 = $ll1['nom'];
        $description = $description . "-$l1";
    }

        $req = $bdd->prepare('INSERT INTO products(`ref`, `designation`, `categorie_pieceId`, `marque_pieceId`, `marque_vehiculeId`, `image`, `casier`, `fournisseurId`, `pu_fournisseur`, `pu`, `taux_remise`, `description`) VALUES(:r, :ds, :ci, :mpi, :mvi, :i, :c, :fi, :pf, :p, :tr, :d)');
        $req->execute(array(
            'r' => $ref,
            'ds' => $designation,
            'ci' => $categorie_pieceId,
            'mpi' => $marque_pieceId,
            'mvi' => $marque1,
            'i' => $path,
            'c' => $casier,
            'fi' => $fournisseurId,
            'pf' => $pu_fournisseur,
            'p' => $pu,
            'tr' => $remise,
            'd' => $description
        ));
}
header('Location: ../views/products.php?g=1');
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

<!-- <body>
    <div>
        <a href="../index.php">
            <h1>app logo</h1>
        </a>

    </div>
    <div>
        <form action="#" method="post" enctype='multipart/form-data'>
            <label for="ref">reference</label>
            <input type="text" name="ref" id="ref" required> <br>
            <label for="designation">designation</label>
            <input type="text" name="designation" id="designation" required> <br>
            <label for="categorie">categorie piece</label>
            <select name="categorie_pieceId">
                <?php foreach ($reponse1 as $r1) :
                    $nom = $r1['nom'];
                    $id = $r1['id'];
                    echo "<option value='$id'>$nom";
                endforeach;
                ?>
            </select>
            <label for="marque_pieceId">marque piece</label>
            <select name="marque_pieceId">
                <?php foreach ($reponse2 as $r2) :
                    $nom = $r2['nom'];
                    $id = $r2['id'];
                    echo "<option value='$id'>$nom";
                endforeach;
                ?>
            </select>
            <label for="marque_vehiculeId">marque vehicule</label>
            <select name="marque_vehiculeId">
                <?php foreach ($reponse3 as $r3) :
                    $nom = $r3['nom'];
                    $id = $r3['id'];
                    echo "<option value='$id'>$nom";
                endforeach;
                ?>
            </select> <br>
            <label for="casier">casier</label>
            <input type="text" name="casier" id="casier"> <br>
            <label for="image">image</label>
            <input class="btn btn-info" type="file" id='upload' name="profile" accept="image/*"> <br>
            <?php foreach ($reponse4 as $r4) :
                $nom = $r4['nom'];
                $id = $r4['id'];
                echo "<input type='checkbox' id='$id' value='$id' name='fournisseurId[]'> 
                    <label for='$id'>$nom</label> 
            <input type='number' name='pu_fournisseur[]' id='pu_fournisseur'>
            <label for='pu_fournisseur'>prix unitaire fournisseur</label> <br>";
            endforeach;
            echo "<br>";
            ?>
            <label for="pu">prix unitaire</label>
            <input type="number" name="pu" id="pu"> <br>
            <label for="remise">taux de remise</label>
            <input type="number" name="remise" id="remise">%<br>
            <textarea name="description" id="" cols="30" rows="10"></textarea> <br>
            <input type="submit" value="ajouter">
        </form>
    </div>
</body> -->