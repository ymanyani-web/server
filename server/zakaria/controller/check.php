<?php

session_start();
$_SESSION['user'] = strtolower($_POST['nom']);


    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=zakaria;charset=utf8', 'root', 'root');
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }


 
if ($_POST['nom'] && $_POST['passwd'])
{
    echo "11";
    $user = strtolower($_POST['nom']);
    $passwd = sha1($_POST['passwd']);
    $reponse = $bdd->query('SELECT * FROM users WHERE username =\'' . $user . '\'');
    $donnees = $reponse->fetch();
    if($donnees['username'] == $user && $donnees['password'] == $passwd )
    {
        echo "1122";
        header('Location: ../view/index.php');
    }
    else{
        echo "eee2";
        session_destroy();
        header('Location: ../index.php?msg=1');
    }

    
}




function check_user($user, $passwd)
{
    echo $user;
    $reponse = $bdd->query('SELECT * FROM users WHERE username =\'' . $user . '\'');
    $donnees = $reponse->fetch();
    echo $donnees['username'];
    if($donnees['username'] == $user && $donnees['password'] == $passwd )
        echo ("good");
    else 
        return("not good");
} 