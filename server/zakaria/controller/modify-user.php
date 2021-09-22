<?php
$db = mysqli_connect('localhost', 'root', 'root', 'zakaria');
$nom = $_POST['nom'];
$cin = $_POST['cin'];
$rib = $_POST['rib'];
$id = $_POST['id'];

echo $nom;
echo $cin;
echo $rib;
echo $id;


$nom1 = $_POST['nom1'];
$cin1 = $_POST['cin1'];

$nom2 = $nom;
$cin2 = $cin;




    $sql_1 = "UPDATE clients SET nom='$nom', cin='$cin', rib='$rib' WHERE id = '$id'";
    $res_e = mysqli_query($db, $sql_1);


    $sql_1 = "UPDATE client SET nom='$nom2', cin='$cin2'  WHERE nom = '$nom1' AND cin = '$cin1'";
    $res_e = mysqli_query($db, $sql_1);

    $sql_1 = "UPDATE client SET cin='$cin2'  WHERE nom = '$nom1' AND cin = '$cin1'";
    $res_e = mysqli_query($db, $sql_1);

    $sql_1 = "UPDATE client SET cin='$cin2'  WHERE nom = '$nom1'";
    $res_e = mysqli_query($db, $sql_1);


    header('Location: ../view/index.php?msg=11111');

