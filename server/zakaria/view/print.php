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
$array = $_POST['result'];
$category_string = "" . implode(",",$array) . "";
$reponse = $bdd->query("SELECT * FROM client WHERE id IN ($category_string)"); 
$start = substr($_POST['start'], 0, 10);
$end = substr($_POST['end'], 0, 10);
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
        <table id="tab1">
                <tr>
                    <th style="font-size: 10px;">Nom</th>
                    <th style="font-size: 10px;">CIN</th>
                    <th style="font-size: 10px;">RIB</th>
                    <th style="font-size: 10px;">Periode</th>
                </tr>
                <tr>
                    <td style="font-size: 10px; height:10px; wight:100px; "><?php echo $_POST['nnn']?></td>
                    <td style="font-size: 10px;"><?php echo $_POST['ccc']?></td>
                    <td style="font-size: 10px;"><?php echo $_POST['rrr']?></td>
                    <td style="font-size: 10px;"><?php echo $start . " - " . $end ?></td>
                </tr>
        </table>
    </div>
    <div style="margin-top: 20px;">
        <table class=" table-striped table-bordered" id="table_abc tab2" width="100%" style="table-layout: fixed;">
            <tr>
                <th style="width: 26%;">Date</th>
                <th>libelle</th>
                <th style="width: 15%;">credit</th>
                <th style="width: 15%;">debit</th>
            </tr> 
            <?php  foreach ($reponse as $r):  ?>
            <tr>
                <?php $temps = substr($r['temps'], 0, 16)?>
                <td style="width:250px; max-width:355px;"><?php echo $temps ?></td>
                <td><?php echo $r['libelle'] ?></td>
                <td style="width: 20%;"><?php if($r['credit'] != "0"){echo number_format($r['credit'], 2)." dh";} else echo "-" ;?></td>
                <td style="width: 20%;"><?php if($r['debit'] != "0"){echo number_format($r['debit'], 2)." dh";} else echo "-" ;?></td>
            </tr> 
            <?php  endforeach;  ?>
            <tr>
                <th scope="row" colspan="2">Totaux des operations</th>
                <td><?php echo number_format($_POST['g1'], 2) . " dh"?></td>
                <td><?php echo number_format($_POST['g2'], 2) . " dh"?></td>
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