<?php
$inter = "";
foreach($_POST['inter'] as $val)
{
    $inter = $inter . $val ." - ";
}
$inter = $inter . $_POST['autres1'] ." - " . $_POST['autres2'] ." - " . $_POST['autres3'] ." - " . $_POST['autres4'] ." - ". $_POST['autres5'] ." - ". $_POST['autres6'] ." - ". $_POST['autres7'];
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=ellariasystems;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
$req = $bdd->prepare('INSERT INTO intervention(nom_intervenant, lieu_intervention, `date`, date_from, date_to, intervention ) VALUES(:nom, :lieu, :dd, :dd_from, :dd_to, :inn)');
$req->execute(array(
    'nom'=> $_POST['nom'],
    'lieu'=> $_POST['lieu'],
    'dd'=> $_POST['datee'],
    'dd_from'=> $_POST['date_from'],
    'dd_to'=> $_POST['date_to'],
    'inn'=> $inter,
));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/my.css" rel="stylesheet">
    <title>Print</title>
</head>
<body>
    <header>
        <div id="first_header">
            <a href="index.php"><img src="logo.png" alt=""></a>
        </div>
        <div id="second_header">
            <div class="sous_header1"><br><br><span style="font-size:40px">Fiche d'intervention</span></div>
            <div class="sous_header2"><br><br><span style="font-size:20px">Ellaria systems</span></div>
        </div>
    </header>
    <div id="info">
        <div class="info1">
            Nom d'intervenant: <?php echo $_POST['nom']?> <br>
            Lieu d'intervention: <?php echo $_POST['lieu']?> <br>
            N ticket: .....................
        </div>
        <div class="info1">
            Date d'intervention: <?php echo $_POST['datee']?> <br>
            Heure d'intervention: <?php echo $_POST['date_from'] . "-" . $_POST['date_to']?> <br>
            Fait génerateur de l'intervention:<ul>
                <li><input type="checkbox">Appel de l'itulisateur</li>
                <li><input type="checkbox">Ticket GPLI</li>
            </ul>
        </div>
    </div>
    <div id="nature">
        <span>Nature de l'intervention</span>
    </div>
    <div id="nature1">
        <div id="nature1_1">
            <div style="text-align: center; font-size: 25px"><u><b>RENSEIGNEMENTS</b></u></div> <br>
            Ordinateur: <br>
            <input type="checkbox">PC<input type="checkbox">POS<input type="checkbox">Autres(Preciser): <br><br>
            Type et Marque <br><br>
            <b>Systeme d'exploitation</b><br>
            <input type="checkbox">Windows Emedded <br>
            <input type="checkbox">Windows 10 <br>
            <input type="checkbox">Windows 7 <br>
            <input type="checkbox">Linux <br><br><br><br><br>
            <input type="checkbox">MAC OS vesrion: <br>
            <input type="checkbox"> Autres: <br><br><br>
            <b>Origine du probleme rencontre:</b><br>
            <input type="checkbox">Inconnue
            <input type="checkbox">Materiel
            <input type="checkbox">Logiciel
        </div>
        <div id="nature1_2">
            <div id="nature_1_2_1">
                <div style="text-align: center; font-size: 25px"><u><b>INTERVENTION</b></u></div><br>
                <input type="checkbox" <?php foreach($_POST['inter'] as $val){if($val == "installation")echo "checked";}?> >Instatllation
                <input type="checkbox" <?php foreach($_POST['inter'] as $val){if($val == "desinstallation")echo "checked";}?> >Desinstallation
                <input type="checkbox" <?php foreach($_POST['inter'] as $val){if($val == "depannage")echo "checked";}?> >Depannage
                <input type="checkbox" <?php foreach($_POST['inter'] as $val){if($val == "mise a jour")echo "checked";}?> >Mise a jour <br>
                <input type="checkbox" <?php foreach($_POST['inter'] as $val){if($val == "sauvegarde")echo "checked";}?> >Sauvegarde
                <input type="checkbox" <?php foreach($_POST['inter'] as $val){if($val == "recuperation")echo "checked";}?> >Recuperation
                <input type="checkbox" <?php foreach($_POST['inter'] as $val){if($val == "supression")echo "checked";}?> >Supression
                <input type="checkbox" <?php foreach($_POST['inter'] as $val){if($val == "nettoyage")echo "checked";}?> >Nettoyage <br>
                <input type="checkbox" <?php foreach($_POST['inter'] as $val){if($val == "config boites mails")echo "checked";}?> >Configuration Boites Mails
                <input type="checkbox" <?php foreach($_POST['inter'] as $val){if($val == "config reseau")echo "checked";}?> >Configuration resau(wifi/CPL, ...) <br>
                <input type="checkbox" <?php foreach($_POST['inter'] as $val){if($val == "autres")echo "checked";}?> >Autres (preciser) <br>
                -<input type="text" class="autres" value="<?php echo $_POST['autres1']?>" ><br>
                -<input type="text" class="autres" value="<?php echo $_POST['autres2']?>"><br>
                -<input type="text" class="autres" value="<?php echo $_POST['autres3']?>"><br>
                -<input type="text" class="autres" value="<?php echo $_POST['autres4']?>"><br>
                -<input type="text" class="autres" value="<?php echo $_POST['autres5']?>"><br>
                -<input type="text" class="autres" value="<?php echo $_POST['autres6']?>"><br>
                -<input type="text" class="autres" value="<?php echo $_POST['autres7']?>"><br>
                <b>Probleme resolu:</b> <br><br>
                <input type="checkbox"> OUI <input type="checkbox"> NON
            </div>
            <div id="nature_1_2_2">
                Commentaire intervenant: .........................................................................................................................................................................................................
                .............................................................................................................................................................................................................
                ..............................................................................................................................................................................................................
                ..............................................................................................................................................................................................................
                ..............................................................................................................................................................................................................


            </div>    
        </div>
    </div>
    <div id="table">
        <table id="testt"> 
            <tr>
                <th>Nom machine</td>
                <th>IP</td>
                <th>OS</td>
                <th>Date mise a jour</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Windows:</td>
                <td></td>
            </tr>
        </table>
    </div>
    <div id="satisfaction">
        <p>
            <u>SATISFACTION: Est-ce que vous êtes satisfait de l’intervention du technicien afin de résoudre votre Incident/ Demande ?</u>
            <ul>
                <li>Satisfait: <input type="checkbox"></li>
                <li>Insatisfait: <input type="checkbox"></li>
            </ul>
        </p>
    </div>
    <div id="commentaire">
        <u>Commentaires de l'utlisateur :</u>
        <div id="sous_commentaire">

        </div>
    </div>
    <div id="signature">
        Nom et signature de l'utilisteur :
    </div>
    <footer style="text-align: center">
        Copyright © 2020, Ellaria Systems.
    </footer>
</body>
</html>