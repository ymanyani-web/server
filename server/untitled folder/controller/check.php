<?php
session_start();

$_SESSION['user'] = strtolower(htmlspecialchars($_POST['username']));
?>
<?php
if ($_POST['username'] && $_POST['pin'])
{
    $user = strtolower($_POST['username']);
    $passwd = sha1(htmlspecialchars($_POST['pin']));
    if(check_user($user, $passwd) == "good")
    {
        header('Location: ../view/show.php');
    }
    if(check_user($user, $passwd) == "admin")
    {
        header('Location: ../view/admin.php');
    }
    elseif(check_user($user, $passwd) == "not active")
    {
        session_destroy();
        $msg = "ur account is not verifed, please check ur mail, then try again!";
        require('../view/sign_in.php');
    }
    else
    {
        session_destroy();
        $msg = "the username or the password are invalid, or u re not allowed, try again!";
        require('../view/sign_in.php');
    }
}


function check_user($user, $passwd)
{
    include     'connect_db.php';
    $reponse = $bdd->query('SELECT * FROM users WHERE username =\'' . $user . '\'');
    $donnees = $reponse->fetch();
    if($donnees['username'] == $user && $donnees['pin'] == $passwd && $donnees['active'] == "1" && $donnees['role'] == 'user')
    {
        $_SESSION['role'] = $donnees['role'];
        return ("good");
    }
    if($donnees['username'] == $user && $donnees['pin'] == $passwd && $donnees['active'] == "1" && $donnees['role'] == 'admin')
    {
        $_SESSION['role'] = $donnees['role'];
        return ("admin");
    }
    else if($donnees['active'] == "0")
        return("not active");
}
?>