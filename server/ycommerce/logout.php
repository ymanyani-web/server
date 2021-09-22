<?php
session_start();
$_SESSION['currentUser'] = null;
session_destroy();
header('Location: index.php');
?>