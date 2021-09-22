<?php
$db = mysqli_connect('localhost', 'root', 'root', 'zakaria');
$lb = $_POST['libelle'];
$id = $_POST['id'];



if($_POST['credit'] != 0)
{
    $cr = $_POST['credit'];
    $sql_1 = "UPDATE client SET credit='$cr', libelle='$lb' WHERE id = '$id'";
    $res_e = mysqli_query($db, $sql_1);
    header('Location: ../view/index.php?msg=111');
}

if($_POST['debit'] != 0)
{
    $cr = $_POST['debit'];
    $sql_1 = "UPDATE client SET debit='$cr', libelle='$lb' WHERE id = '$id'";
    $res_e = mysqli_query($db, $sql_1);
    header('Location: ../view/index.php?msg=111');
}
