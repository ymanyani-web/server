<?php 
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=ellariasystems;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
?>

<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
		<title>Lapsus - Website Landing Page</title>
		<!-- Description, Keywords and Author -->
		<meta name="description" content="Your description">
		<meta name="keywords" content="Your,Keywords">
		<meta name="author" content="ResponsiveWebInc">
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- Styles -->
		<!-- Bootstrap CSS -->
		<!-- Custom CSS -->
		

		
		<!-- Favicon -->
		<link rel="shortcut icon" href="#">
		<style>
html {
    height: auto;
    min-height: 100%;
}
body {
    margin:0;
    padding:0;
    font-family: sans-serif;
    color: black;
    background: linear-gradient(white,#0498cf) no-repeat;
    font-size: 12px;
}
.taaaable{
    margin: 0 auto;
    margin-left: 200px;
}
td,th{
    padding:5px 15px;
    text-align:left;
    font-size: 14px;
}
}

    .mad{
        margin-bottom: 275px;
        min-height: 300px;
    }
    .print{
        position: fixed;
        right: 10px;
        bottom: 10px;
        color: #0498cf
    }
    #pr{
        background-color: white;
        border: none;
        color: #0498cf;
        padding: 8px 32px;
        text-decoration: none;
        margin: 4px 2px;
        cursor: pointer;    
    }
    input[type=submit] {
        border-radius: 8px;
    background-color: #0498cf;
    border: none;
    color: white;
    padding: 5px 32px;
    text-decoration: none;
    margin: 4px 2px;
    cursor: pointer;
  }
  .taaaable{
      margin-left: 50px;
  }
</style>



<script>
    if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
<body>
    <header>
        <a href="index.php"><img src="logo.png" alt=""></a>
    </header>
<div class="wrapper">
    <div class="filtre">
        <form action="#" method="POST">
            <label for="start">Select a month:</label>
            <input type="month" id="start" name="mois" required>
            <input type="submit">
        </form>
    </div>


    <?php
    if(!empty($_POST['mois']))
    {
        $start = $_POST['mois']."-01";
        $end = $_POST['mois']."-31";
        $reponse3 = $bdd->query("SELECT * FROM intervention WHERE  `date`<='$end' AND `date`>='$start'");
    }
    ?>
    <div class="mad">
            <table class="taaaable table-striped table-bordered" id="table_abc">
                <tr>
                    <th>date</th>
                    <th>Nom intervenant</th>
                    <th>lieu d'intervention</th>
                    <th>from</th>
                    <th>to</th>
                    <th>ntervention</th>
                </tr> 
                <?php  foreach ($reponse3 as $r):  ?>
                <tr>
                    <td style="width:150px; min-width:150px;" ><?php echo $r['date'] ?></td>
                    <td><?php echo $r['nom_intervenant'] ?></td>
                    <td><?php echo $r['lieu_intervention'] ?></td>
                    <td><?php echo $r['date_from'] ?></td>
                    <td><?php echo $r['date_to'] ?></td>
                    <td><?php echo $r['intervention'] ?></td>
                    <!-- <td style="width:250px; max-width:355px;"><?php echo $r['nom'] ?></td>
                    <td style="width:250px; max-width:355px;"><?php echo $r['libelle'] ?></td>-->
                </tr> 
                <?php  endforeach;  ?>
            </table>
        </div>


<div class="print">
    <form action="print-rap.php" method="post" target="_blank">
        <input type="hidden" value="<?php echo $start?>" name="start" id="">
        <input type="hidden" value="<?php echo $end?>" name="end" id="">
        <input type="hidden" value="<?php echo $g1?>" name="g1" id="">
        <input type="hidden" value="<?php echo $g2?>" name="g2" id="">
        <input type="submit" value="Print" id="pr">
    </form>
</div>