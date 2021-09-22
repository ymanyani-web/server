<?php

function send_mail($user, $email)
{
    $to = $email;
    $subject = 'Signup | Verification';
    $message = "
    Thanks for signin up!
    Your account has been created, you can login with the following credentials <br>
    --------------------------<br>
    Username: " . $user . "<br>
    --------------------------<br>";
    $headers = "From:noreply@camagru \r\n";
    $headers .= "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    if(mail($to, $subject, $message, $headers))
    {
        echo"yes";
    }
    else{
        echo "no";
    }
}

require './Models/User.php';

$nn = $_FILES['profile']['name'];
move_uploaded_file($_FILES['profile']['tmp_name'], "images/$nn");    
$path = "images/$nn";
$name = isset($_POST['fname']) ? $_POST['fname'] : "";
$phone = isset($_POST['phone']) ? $_POST['phone'] : "";
$address = isset($_POST['address']) ? $_POST['address'] : "";
$mail = isset($_POST['email']) ? $_POST['email'] : "";
$pass = isset($_POST['pass']) ? $_POST['pass'] : "";
$cpass = isset($_POST['cpass']) ? $_POST['cpass'] : "";
$profile = isset($path) ? $path : "";

if ($pass !== $cpass) {
    header("Location:register.php?error=Error:Password and Password confirmation don't match");
}

$user = new User($name, $mail, $pass, $phone, $profile);

$userAdded = $user->UserRegisterLogic();
if ($userAdded) {
    send_mail($name, $mail);
    $_SESSION['currentUser'] = $user;
    header("Location: shop.php");
} else {
    header("Location: signup.php?error=Error:User already exists");
}