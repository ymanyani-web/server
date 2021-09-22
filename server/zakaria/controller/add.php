<?php

$nom = strtolower($_POST['nom']);
$prenom = strtolower($_POST['prenom']);
$user = $nom . ' ' . $prenom;
$cin = $_POST['cin'];
$rib = $_POST['rib'];
echo $rib;
$db = mysqli_connect('localhost', 'root', 'root', 'zakaria');
  if(isset($_POST['cin'])){
  $sql_e = "SELECT * FROM clients WHERE cin='$cin' AND nom='$user'";
  $res_e = mysqli_query($db, $sql_e);
}

if(mysqli_num_rows($res_e) > 0)
{
    $msg = "Sorry... user already exist!";
    require('../view/new-c.php');
}
else
{
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=zakaria;charset=utf8', 'root', 'root');
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }
    $req = $bdd->prepare('INSERT INTO clients(nom, cin, rib) VALUES(:n, :c, :r)');
    $req->execute(array(
        'n' => $user,
        'c' => $cin,
        'r' => $rib,
    ));
    header('Location: ../view/index.php?msg=1');
} 	