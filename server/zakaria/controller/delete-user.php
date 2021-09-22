<?php
$id = $_GET['id'];
$db = mysqli_connect('localhost', 'root', 'root', 'zakaria');
$sql_1 = "DELETE FROM `clients` WHERE id = '$id'";
$res_e = mysqli_query($db, $sql_1);

header('Location: ../view/index.php?msg=111111');
