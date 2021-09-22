<?php
session_start();
$_SESSION['currentUser'] = null;
session_unset();
echo ('<h1 style="textAlign=center">Logging out . . .</h1>');
header('Location: index.php');
?>