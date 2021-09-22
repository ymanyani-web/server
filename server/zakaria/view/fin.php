<?php

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=zakaria;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
/* print_r($_POST['result']); */

$today_end = date("Y-m-d") . " 23:59:59";
$today_start = date("Y-m-d") . " 00:00:00";
$reponse111 = $bdd->query("SELECT * FROM client WHERE temps <= '$today_end' AND temps >= '$today_start'");


$reponse1 = $bdd->query("SELECT SUM(credit) AS `credit` FROM client WHERE temps <= '$today_end' AND temps >= '$today_start'");
$donnes1 = $reponse1->fetch();
$g1 = $donnes1['credit'];
$reponse2 = $bdd->query("SELECT SUM(debit) AS `debit` FROM client WHERE temps <= '$today_end' AND temps >= '$today_start'");
$donnes2 = $reponse2->fetch();
$g2 = $donnes2['debit'];
?>
	<!-- Styles -->
		<!-- Bootstrap CSS -->
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<!-- Custom CSS -->

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
}


table, th, td {
  border: 1px solid black;
  font-size: 12px;
}
#tab2{
    margin-left: 8%;
    margin-right: 8%;
    position: relative;
    top: 60px;
}
#tab1{
     position: relative; 
margin: 0 auto;
margin-right: 10;
width: 75%;
}

</style>

<style type="text/css">
</style>
<html>
    <head>
    </head>
<body onload="printDiv('printMe')">
<div id='printMe'>
        <!-- banner -->
            <!-- logo image -->
            <img class="img-responsive" src="../img/logo.png" alt="" />
    <div >
    </div>
    <div style="margin-top: 20px;">
        <table class=" table-striped table-bordered" id="table_abc tab2" width="100%" style="table-layout: fixed;">
            <tr>
                <th style="width: 26%;">Date</th>
                <th style="width: 15%;">Nom</th>
                <th>libelle</th>
                <th style="width: 15%;">credit</th>
                <th style="width: 15%;">debit</th>
            </tr> 
            <?php  foreach ($reponse111 as $r):  ?>
            <tr>
                <?php $temps = substr($r['temps'], 0, 16)?>
                <td style="width:250px; max-width:355px;"><?php echo $temps ?></td>
                <td style="width: 20%;"><?php echo $r['nom']?></td>
                <td><?php echo $r['libelle'] ?></td>
                <td style="width: 20%;"><?php if($r['credit'] != "0"){echo number_format($r['credit'], 2)." dh";} else echo "-" ;?></td>
                <td style="width: 20%;"><?php if($r['debit'] != "0"){echo number_format($r['debit'], 2)." dh";} else echo "-" ;?></td>
            </tr> 
            <?php  endforeach;  ?>
            <tr>
                <th scope="row" colspan="3">Totaux des operations</th>
                <td><?php echo number_format($g1, 2) . " dh"?></td>
                <td><?php echo number_format($g2, 2) . " dh"?></td>
            </tr>
        </table>
    </div>
</div>

</body>

</html>



<script>
		function printDiv(divName){
			var printContents = document.getElementById(divName).innerHTML;
			var originalContents = document.body.innerHTML;

			document.body.innerHTML = printContents;

			window.print();

			document.body.innerHTML = originalContents;
            window.onfocus=function(){ window.close();} 

		}
	</script>