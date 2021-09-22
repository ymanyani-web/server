<?php
session_start();
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=cafe;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
$password = $_POST['password'];
$user = $bdd->query("SELECT * FROM personnel WHERE `password` = '$password'");
$waiter = $user->fetch();
if(isset($_POST['password'])){
    $pswd = $_POST['password'];
    date_default_timezone_set('Africa/Casablanca');
    $categories = $bdd->query("SELECT * FROM personnel WHERE `password` = '$pswd'");
    $personnel = $categories->fetch();
    $nom = $personnel['nom'];
    $service = $bdd->query("SELECT * FROM `service` WHERE nom_personnel = '$nom' ORDER BY id DESC LIMIT 1");
    $ss = $service->fetch();
    echo $ss['nom_personnel'];
    if($ss['date_fin'] == "0001-01-01 01:01:00"){
        for ($i = 1; $i <= 1000; $i++) {
            if(isset($_SESSION["command$i"])){
                $res = $_SESSION["command$i"];
                $idd = $res['idd']; 
        
                $product = $bdd->query("SELECT * FROM products WHERE id = '$idd'");
                $donnees = $product->fetch();
                $prix = $donnees['prix'] * $res['num'];
        
                $req = $bdd->prepare('INSERT INTO commands(nom_produit, quantite, `prix_t`, id_waiter, nom_waiter) VALUES(:n, :q, :p, :id, :nm)');
                $req->execute(array(
                    'n' => $donnees['nom'],
                    'q' => $res['num'],
                    'p' => $prix,
                    'id' => $waiter['id'],
                    'nm' => $waiter['nom'],
                ));
                session_destroy();
                echo '<script> window.location.replace("../view/index.php");</script>';
            }
            if(!isset($_SESSION["command$i"])){
                break;
            }
        } 
    }
    else{
        header('Location: ../view/index.php?error=start_service_first');
    }
}