<?php

require './Models/User.php';

$mail = isset($_POST['email']) ? $_POST['email'] : "";
$pass = isset($_POST['pass']) ? $_POST['pass']: "";

if($mail == "" || $pass == ""){
    header("Location: login.php?error=Both mail and password are mandatory");
}

$tempUser = User::getUserByMailAndPassword($mail, $pass);

if($tempUser == null)
{
    header("Location: register.php?Error=User not found, please try register");
}

$user = new User($tempUser->Name, $tempUser->Mail, $tempUser->Pass, $tempUser->Phone, $tempUser->ProfileImg);

if($user->UserLoginLogic()){
    $_SESSION['currentUser'] = $user;
    header("Location: shop.php");
}
else{
    header("Location: login.php?error=Error:Incorrect mail or password, please try again");
} 

?>