<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=gestion;charset=utf8', 'root', 'root');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
$list1 = $bdd->query("SELECT * FROM categorie_piece");
$list2 = $bdd->query("SELECT * FROM marque_piece");
$list3 = $bdd->query("SELECT * FROM fournisseur");
if (isset($_POST['ref'])) {
    $var1 = !empty($_POST['ref']) ? $_POST['ref'] : '%';
    $var2 = !empty($_POST['designation']) ? $_POST['designation'] : "%";
    $var3 = !empty($_POST['fournisseur']) ? $_POST['fournisseur'] : '%';
    $var4 = !empty($_POST['type']) ? $_POST['type'] : '%';
    $var5 = !empty($_POST['marque']) ? $_POST['marque'] : '%';

    /* $reponse1 = $bdd->query("SELECT * FROM  products WHERE `ref` LIKE '$var1' AND designation LIKE '$var2' "); */
     $reponse1 = $bdd->query("SELECT * FROM  products WHERE `ref` Like '$var1' AND designation like '$var2' AND fournisseurId LIKE '$var3' AND categorie_pieceId LIKE '$var4' AND marque_pieceId Like '$var5' "); 
    

}
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <div>
        <a href="../index.php">
            <h1>app logo</h1>
        </a>
    </div>
    <div>
        <form action="" method="post">
            filtrer par: <br>
            <label for="ref">reference</label>
            <input type="text" name="ref" id="ref">
            <label for="designation">designation</label>
            <input type="text" name="designation" id="designation">
            <label for="fournisseur">fournisseur</label>
            <select name="fournisseur">
                <option value='' selected>
                    <?php foreach ($list3 as $l3) :
                        $nom = $l3['nom'];
                        $id = $l3['id'];
                        echo "<option value='$id'>$nom";
                    endforeach;
                    ?>
            </select>
            <label for="type">categorie piece</label>
            <select name="type">
                <option selected></option>
                <?php foreach ($list1 as $l1) :
                    $nom = $l1['nom'];
                    $id = $l1['id'];
                    echo "<option value='$id'>$nom";
                endforeach;
                ?>
            </select>
            <label for="marque">marque</label>
            <select name="marque">
                <option selected></option>
                <?php foreach ($list2 as $l2) :
                    $nom = $l2['nom'];
                    $id = $l2['id'];
                    echo "<option value='$id'>$nom";
                endforeach;
                ?>
            </select><br>
            <input type="submit">
        </form>
    </div>

    <div>
        <?php if(isset($_POST['ref'])){?>
        <table class="taaaable table-striped table-bordered" id="table_abc">
            <thead>
                <th>reference</th>
                <th>designation</th>
                <th>categorie piece</th>
                <th>marque piece</th>
                <th>marque vehicule</th>
                <th>casier</th>
                <th>fournisseur</th>
                <th>prix unitaire</th>
                <!-- <th>quantite</th> -->
            </thead>
            <?php
            foreach ($reponse1 as $r) :
                $fournisseur = $r['fournisseurId'];
                $category = $r['categorie_pieceId'];
                $marque_piece = $r['marque_pieceId'];
                $marque_vehicule = $r['marque_vehiculeId'];
                $dlist1 = $bdd->query("SELECT * FROM fournisseur WHERE id=$fournisseur");
                $dlist2 = $bdd->query("SELECT * FROM categorie_piece WHERE id=$category");
                $dlist3 = $bdd->query("SELECT * FROM marque_piece WHERE id=$marque_piece");
                $dlist4 = $bdd->query("SELECT * FROM marque_vehicule WHERE id=$marque_vehicule");
            ?>
                <tr class='clickable-row' data-href='product-details.php?id=<?php echo $r['id'] ?>'>
                    <td> <?php echo $r['ref'] ?> </td>
                    <td> <?php echo $r['designation'] ?> </td>
                    <td> <?php foreach ($dlist2 as $dl2) : echo $dl2['nom'];
                            endforeach; ?> </td>
                    <td> <?php foreach ($dlist3 as $dl3) : echo $dl3['nom'];
                            endforeach; ?> </td>
                    <td> <?php foreach ($dlist4 as $dl4) : echo $dl4['nom'];
                            endforeach; ?> </td>
                    <td> <?php echo $r['casier'] ?> </td>
                    <td> <?php foreach ($dlist1 as $dl1) : echo $dl1['nom'];
                            endforeach;  ?> </td>
                    <td> <?php echo $r['pu'] ?> </td>
                    <!-- <td> <?php/*  echo $r['quantite_global'] */ ?> </td> -->
                </tr>
            <?php endforeach;  ?>
        </table>
        <?php }?>
    </div>
</body>

<script>
    jQuery(document).ready(function($) {
        $(".clickable-row").click(function() {
            window.location = $(this).data("href");
        });
    });
</script>
<style>
    tr:hover {
        background: red;
    }
</style>

</html>