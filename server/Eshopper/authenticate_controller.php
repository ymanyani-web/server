<?php

require './Models/User.php';

// json_encode(Objet) => JSON STRING; // encoder en JSON
// json_decode(JSON String) => PHP Object; // pour Decoder un objet en JSON

$name = isset($_POST['fname']) ? $_POST['fname'] : "";
$phone = isset($_POST['phone']) ? $_POST['phone'] : "" ;
$address = isset($_POST['address']) ? $_POST['address']:"" ;
$mail = isset($_POST['email']) ? $_POST['email'] : "" ;
$pass = isset($_POST['pass']) ? $_POST['pass'] : "" ;
$cpass = isset($_POST['cpass'])? $_POST['cpass'] : "";
$profile = isset($_POST['profile'])? $_POST['profile'] : "";

if($pass !== $cpass){
    header("Location:register.php?error=Error:Password and Password confirmation don't match");
}

$user = new User($name, $mail, $pass, $phone, $profile);

$userAdded = $user->UserRegisterLogic();
if($userAdded){
    $_SESSION['currentUser'] = $user;
    header("Location: shop.php");
}
else{
    header("Location: register.php?error=Error:User already exists");
}


// 1- Vérifier si l'utilisateur est déjà créé
//      - SI OUI: Retourner erreur
//      - SI NON: Ajouter utilisateur
// 2- Retourner une réponse (rediriger mon utilisateur) => shop.html | register.hhtml



?>