<?php
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=zakaria;charset=utf8', 'root', 'root');
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }
    $nothing = 0;


    if($_POST['nom'] && $_POST['cin'])
    {
        $user = $_POST['nom'];
        $reponse = $bdd->query('SELECT * FROM clients WHERE nom =\'' . $user . '\'');
        $donnees = $reponse->fetch();
        if($donnees['nom'] == $_POST['nom'] && $donnees['cin'] == $_POST['cin'] )
        {
            if($_POST['operation'] === "debit")
            {
                $req = $bdd->prepare('INSERT INTO client(nom, cin, debit, credit, libelle) VALUES(:n, :c, :d, :cr, :l)');
                $req->execute(array(
                'n' => $_POST['nom'],
                'c' => $_POST['cin'],
                'd' => $_POST['mad'],
                'cr' => $nothing,
                'l' => $_POST['libele'],
                ));
            }
            if($_POST['operation'] === "credit")
            {
                $req = $bdd->prepare('INSERT INTO client(nom, cin, debit, credit, libelle) VALUES(:n, :c, :d, :cr, :l)');
                $req->execute(array(
                'n' => $_POST['nom'],
                'c' => $_POST['cin'],
                'd' => $nothing,
                'cr' => $_POST['mad'],
                'l' => $_POST['libele'],
                ));
            }
            header('Location: ../view/index.php?msg=11');
        }
        else{
            header('Location: ../view/operation.php?msg=11');
        }
       
    } 
    else if($_POST['nom'])
    {
        if($_POST['operation'] === "debit")
            {
                $req = $bdd->prepare('INSERT INTO client(nom, cin, debit, credit, libelle) VALUES(:n, :c, :d, :cr, :l)');
                $req->execute(array(
                'n' => $_POST['nom'],
                'c' => "0000",
                'd' => $_POST['mad'],
                'cr' => $nothing,
                'l' => $_POST['libele'],
                ));
            }
            if($_POST['operation'] === "credit")
            {
                $req = $bdd->prepare('INSERT INTO client(nom, cin, debit, credit, libelle) VALUES(:n, :c, :d, :cr, :l)');
                $req->execute(array(
                'n' => $_POST['nom'],
                'c' => "0000",
                'd' => $nothing,
                'cr' => $_POST['mad'],
                'l' => $_POST['libele'],
                ));
            }
            header('Location: ../view/index.php?msg=11');    
    }