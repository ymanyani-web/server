<?php
session_start();
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=commerce;charset=utf8', 'root', 'root');
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }

if ($_POST['email'] && $_POST['pass'])
{
    $email = strtolower($_POST['email']);
    $pass = sha1(htmlspecialchars($_POST['pass']));
    $reponse = $bdd->query('SELECT * FROM users WHERE email =\'' . $email . '\'');
    $donnees = $reponse->fetch();
    if($donnees['email'] == $email && $donnees['password'] == $pass)
    {
        $_SESSION['username'] = $donnees['name'];
        header('Location: ../index.php');
    }
    else{
        echo "<script>alert('email or password invalid')</script>";
        echo "<script> window.history.back();</script>";

    }
}