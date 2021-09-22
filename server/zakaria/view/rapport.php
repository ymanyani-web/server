<?php
session_start();
if(empty($_SESSION['user']))
{
	header('Location: ../index.php?msg=2');
}
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=zakaria;charset=utf8', 'root', 'root');
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
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<!-- Font awesome CSS -->
		<link href="../css/font-awesome.min.css" rel="stylesheet">		
		<!-- Custom CSS -->
		<link href="../css/style.css" rel="stylesheet">
		<link href="../css/my.css" rel="stylesheet">
		
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
  background: linear-gradient(#0000, #FF8B00);
}
.login-box {
    position: absolute;
    top: 32%;
    left: 14%;
    width: 370px;
    padding: 6px;
    transform: translate(-50%, -50%);
    background: rgba(0,0,0,.5);
    box-sizing: border-box;
    box-shadow: 0 15px 25px rgba(0,0,0,.6);
    }
    #login-box1 {
    position: absolute;
    top: 72%;
    left: 14%;
    width: 370px;
    padding: 6px;
    transform: translate(-50%, -50%);
    background: rgba(0,0,0,.5);
    box-sizing: border-box;
    box-shadow: 0 15px 25px rgba(0,0,0,.6);
    }

    .mad{
        margin-bottom: 275px;
        min-height: 300px;
    }
    .print{
        position: fixed;
        right: 10px;
        bottom: 10px;
    }
    #pr{
        background-color: #FFFFFF;
        border: none;
        color: #FF8B00;
        padding: 8px 32px;
        text-decoration: none;
        margin: 4px 2px;
        cursor: pointer;    
    }
    input[type=submit] {
        border-radius: 8px;
    background-color: #FF8B00;
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

<div class="wrapper">
			<!-- banner -->
					<div class="banner-content">
						<!-- logo image -->
						<a href="index.php"><img class="img-responsive" src="../img/logo.png" alt="" /></a>
					</div>
                    <div class="langue">
                        <a href="../view/releve.php?lg=1">عربي | </a>
                        <a href="../view/releve.php">Français</a>
                    </div>
			</div>
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
            $start = $_POST['mois']."-01 00:00:00";
            $end = $_POST['mois']."-31 23:59:59";

        $nom = $_POST['nom']; 
        $nom1 = $_POST['nom']; 
        $reponse1 = $bdd->query("SELECT SUM(credit) AS `credit` FROM client WHERE temps<='$end' AND temps>='$start' ");
        $donnes1 = $reponse1->fetch();
        $g1 = $donnes1['credit'];
        $reponse2 = $bdd->query("SELECT SUM(debit) AS `debit` FROM client WHERE  temps<='$end' AND temps>='$start'");
        $donnes2 = $reponse2->fetch();
        $g2 = $donnes2['debit'];
        $reponse3 = $bdd->query("SELECT * FROM client WHERE  temps<='$end' AND temps>='$start'");
    }
    ?>
    <div class="mad">
            <table class="taaaable table-striped table-bordered" id="table_abc">
                <tr>
                    <th>Date</th>
                    <th>Nom</th>
                    <th>libelle</th>
                    <th>credit</th>
                    <th>debit</th>
                </tr> 
                <?php  foreach ($reponse3 as $r):  ?>
                <tr>
                    <td><a href="modify.php?id=<?php echo $iid?>&id1=<?php echo $r333['id']?>"><?php echo $r['temps'] ?></a></td>
                    <td style="width:250px; max-width:355px;"><?php echo $r['nom'] ?></td>
                    <td style="width:250px; max-width:355px;"><?php echo $r['libelle'] ?></td>
                    <td><?php if($r['credit'] != "0"){echo number_format($r['credit'], 2)." dh";} else echo "-" ;?></td>
                    <td><?php if($r['debit'] != "0"){echo number_format($r['debit'], 2)." dh";} else echo "-" ;?></td>
                </tr> 
                <?php  endforeach;  ?>
                <tfoot>
                <tr>
                    <th scope="row" colspan="3">Totaux des operations</th>
                    <td><?php echo number_format($g1, 2) . " dh"?></td>
                    <td><?php echo number_format($g2, 2) . " dh"?></td>
                </tr>
            </tfoot>
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