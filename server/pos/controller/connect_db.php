<?php
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=camagru;charset=utf8', 'camagru', 'camagru');
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }
