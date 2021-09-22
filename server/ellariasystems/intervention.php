<!DOCTYPE html>
<html lang="en">
<head>
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css1/templatemo-ocean-vibes.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fontawesome/css/all.min.css"> <!-- https://fontawesome.com/ -->
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet"> <!-- https://fonts.google.com/ -->
    <title>ellariasystems</title>
    <style>
        header{
            padding-bottom: 50px;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>
        function myFunction() {
            // Get the checkbox
            var checkBox = document.getElementById("autres");
            // Get the output text
            var text = document.getElementById("autres1");
            // If the checkbox is checked, display the output text
            if (checkBox.checked == true){
                text.style.display = "block";
            } else {
                text.style.display = "none";
            }
            document.getElementById("autres1").required = true;
        }
        function myFunction1(div_selected) {
            var text = document.getElementById(div_selected);
            text.style.display = "block";
        }
    </script>
</head>
<body>
    <header>
        <a href="index.php"><img src="logo.png" alt=""></a>
    </header>
    <div id="formm">
        <form action="print.php" method="post">
            Nom d'intervenant: <input type="text" name="nom"> <br>
            Lieu d'intervention: <input type="text" name="lieu"> <br>
            date: <input type="date" name="datee" required> <br>
            time from: <input type="time" name="date_from" required> 
            to: <input type="time" name="date_to" required> <br>
            Intervention: <br>
            <input type="checkbox" name="inter[]" value="installation">instatllation
            <input type="checkbox" name="inter[]" value="desinstallation">Desinstallation
            <input type="checkbox" name="inter[]" value="depannage">Depannage
            <input type="checkbox" name="inter[]" value="mise a jour">Mise a jour <br>
            <input type="checkbox" name="inter[]" value="sauvegarde">Sauvegarde
            <input type="checkbox" name="inter[]" value="recuperation">Recuperation
            <input type="checkbox" name="inter[]" value="supression">Supression
            <input type="checkbox" name="inter[]" value="nettoyage">Nettoyage <br>
            <input type="checkbox" name="inter[]" value="config boites mails">Configuration Boites Mails
            <input type="checkbox" name="inter[]" value="config reseau">Configuration resau(wifi/CPL, ...) <br>
            <input type="checkbox" name="inter[]" id="autres" value="autres"onclick="myFunction()" >Autres (preciser) <br>
            <div id="autres1">-<input type="text" name="autres1" onclick="myFunction1('autres2')" ><br></div>
            <div id="autres2">-<input type="text" name="autres2" onclick="myFunction1('autres3')"><br></div>
            <div id="autres3">-<input type="text" name="autres3" onclick="myFunction1('autres4')"><br></div>
            <div id="autres4">-<input type="text" name="autres4" onclick="myFunction1('autres5')"><br></div>
            <div id="autres5">-<input type="text" name="autres5" onclick="myFunction1('autres6')"><br></div>
            <div id="autres6">-<input type="text" name="autres6" onclick="myFunction1('autres7')"><br></div>
            <div id="autres7">-<input type="text" name="autres7"><br></div>
            <input type="submit" id="submiit">
        </form>
    </div>