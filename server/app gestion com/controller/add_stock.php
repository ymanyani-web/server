<?php
if(isset($_POST['des']) && isset($_POST['fournisseurId']) && isset($_POST['quantite']) )
{
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=gestion;charset=utf8', 'root', 'root');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    $quantite = $_POST['quantite'];
    $des = $_POST['des'];
    $fournisseurId = $_POST['fournisseurId'];
 /*
    $reponse1 = $bdd->query("UPDATE products SET quantite= quantite + $quantite WHERE designation = '$des' AND fournisseurId = $fournisseurId "); */
    $reponse2 = $bdd->query("SELECT * FROM products WHERE designation = '$des' AND fournisseurId = $fournisseurId LIMIT 1");
    foreach ($reponse2 as $r2) :
        $productId = $r2['id'];
    endforeach;
    echo $productId;
    echo $fournisseurId;
    $req = $bdd->prepare('INSERT INTO stock(productId, fournisseurId, quantite) VALUES(:p, :f, :q)');
    $req->execute(array(
        'p' => $productId,
        'f' => $fournisseurId,
        'q' => $quantite
    ));
    header('Location: ../config/stock.php');
}