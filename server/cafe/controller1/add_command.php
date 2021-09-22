<?php
session_start();
$idd = $_GET['idd'];
$num = $_GET['num'];
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=cafe;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
$product = $bdd->query("SELECT * FROM products WHERE id = '$idd'");
$donnees = $product->fetch();
$nom = $donnees['nom'] . ' x ' . $num;
for ($i = 1; $i <= 1000; $i++) {
    if(!isset($_SESSION["command$i"])){
        $_SESSION["command$i"] = array('id' =>$i,'num' => $num,  'idd'=>$donnees['id'], 'nom'=>$nom, 'prix'=>$donnees['prix']);
        break;
    }
}
/* session_destroy(); */
echo $_GET['num'];