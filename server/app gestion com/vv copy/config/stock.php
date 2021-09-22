<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=gestion;charset=utf8', 'root', 'root');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
$reponse1 = $bdd->query("SELECT * FROM products");
if (isset($_GET['id'])) {
    $des = $_GET['id'];
    $reponse2 = $bdd->query("SELECT products.designation,fournisseurId,fournisseur.nom FROM products LEFT JOIN fournisseur ON products.fournisseurId=fournisseur.id WHERE products.designation = '$des'  ");
}
/* if (isset($_POST['ref'])) {
    $ref = isset($_POST['ref']) ? $_POST['ref'] : "";
    $designation = isset($_POST['designation']) ? $_POST['designation'] : "";
    $categorie_pieceId = isset($_POST['categorie_pieceId']) ? $_POST['categorie_pieceId'] : "";
    $marque_pieceId = isset($_POST['marque_pieceId']) ? $_POST['marque_pieceId'] : "";
    $marque_vehiculeId = isset($_POST['marque_vehiculeId']) ? $_POST['marque_vehiculeId'] : "";
    $casier = isset($_POST['casier']) ? $_POST['casier'] : "";
    $nn = $_FILES['profile']['name'];
    move_uploaded_file($_FILES['profile']['tmp_name'], "../images/$cb-$nn");
    $path =  "images/$cb-$nn";
    $path =  isset($path) ? "images/$cb-$nn" : "";
    $fournisseurId = isset($_POST['fournisseurId']) ? $_POST['fournisseurId'] : "";
    $pu_fournisseur = isset($_POST['pu_fournisseur']) ? $_POST['pu_fournisseur'] : "";
    $pu = isset($_POST['pu']) ? $_POST['pu'] : "";
    $remise = isset($_POST['remise']) ? $_POST['remise'] : "";
    $description = isset($_POST['description']) ? $_POST['description'] : "";


    $req = $bdd->prepare('INSERT INTO products(`ref`, `designation`, `categorie_pieceId`, `marque_pieceId`, `marque_vehiculeId`, `image`, `casier`, `fournisseurId`, `pu_fournisseur`, `pu`, `taux_remise`, `description`) VALUES(:r, :ds, :ci, :mpi, :mvi, :i, :c, :fi, :pf, :p, :tr, :d)');
    $req->execute(array(
        'r' => $ref,
        'ds' => $designation,
        'ci' => $categorie_pieceId,
        'mpi' => $marque_pieceId,
        'mvi' => $marque_vehiculeId,
        'i' => $path,
        'c' => $casier,
        'fi' => $fournisseurId,
        'pf' => $pu_fournisseur,
        'p' => $pu,
        'tr' => $remise,
        'd' => $description
    ));
} */
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script>
        $(function() {
            $('#input10').change(function() {
                var t = $("#nom222 option[value='" + $('#input10').val() + "']").attr('id');
                if (t == undefined) {
                    document.getElementById('id01').style.display = "block";
                    $("#sub").prop("disabled", true);
                } else {
                    location.replace("stock.php?id=" + t + "");
                    $("#sub").prop("disabled", false);
                }
            });
        });
    </script>
</head>

<body>
    <div>
        <a href="../index.php">
            <h1>app logo</h1>
        </a>

    </div>
    <div>
        <form action="../controller/add_stock.php" method="post">
            <input list="nom222" name="des" id="input10" <?php if (!empty($des)) {echo "value='$des'";} ?>>
            <datalist id="nom222">
                <?php foreach ($reponse1 as $rr) :
                    $v = $rr['designation'];
                    $iid = $rr['designation'];
                    echo "<option id='$iid' value='$v'>";
                endforeach;
                ?>
            </datalist>
            <label>designation</label>
            <label for="fournisseurId">fournisseur</label>
            <select name="fournisseurId" id="fournisseurId">
                <?php foreach ($reponse2 as $r2) :
                    $nom = $r2['nom'];
                    $id = $r2['fournisseurId'];
                    echo "<option value='$id'>$nom";
                endforeach;
                ?>
            </select> <br>
            <label for="quantite">quantite</label>
            <input type="number" name="quantite" id="quantite"> <br>
            <input type="submit" value="ajouter">
        </form>
    </div>
</body>