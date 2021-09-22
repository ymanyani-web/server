<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=gestion;charset=utf8', 'root', 'root');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
$productId = $_GET['id'];
$quantite = $_GET['q'];

$req = $bdd->prepare('INSERT INTO stock(productId, quantite) VALUES(:p, :q)');
$req->execute(array(
    'p' => $productId,
    'q' => $quantite
));

$req = $bdd->prepare('UPDATE products SET quantite=quantite+:q WHERE id=:p ');
$req->execute(array(
    'p' => $productId,
    'q' => $quantite
));

?>