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
$reponse222 = $bdd->query("SELECT * FROM clients");
$reponse2222 = $bdd->query("SELECT * FROM clients");

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
        margin : 50px;
        margin-left: 220px;
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
        <div class="filtre-nom">
            <form action="#" method="post" >
                <div class="login-box">
                    <div class="user-box">
                        <input list="nom" name="" id="input" required>
                            <datalist id="">
                                <?php  foreach ($reponse222 as $r222):
                                    $nom = $r222['nom'];
                                    echo $r222['cin'];
                                    echo "<option id ='66' value='$nom'></option>"  ;
                                    endforeach;
                                ?>
                            </datalist>
                        <label>Filter Par nom et prenom</label>
                        <script>
                            var input    = document.querySelector("#input"), // Selects the input.
                            datalist = document.querySelector("datalist"); // Selects the datalist.
                            input.addEventListener("keyup", (e) => {

                            // If input value is longer or equal than 2 chars, adding "users" on ID attribute.
                            if (e.target.value.length >= 3) {
                                datalist.setAttribute("id", "nom");
                            } 
                            else if (e.target.value.length == 0) {
                                datalist.setAttribute("id", "");
                            } 
                            else {
                                datalist.setAttribute("id", "");
                            }
                            });
                        </script>
                        <div class="user-box">
                            <input type="date" id="start" name="start" >
                            <label>From</label>
                        </div>
                        <div class="user-box">
                            <input type="date" id="end" name="end" >
                            <label>To</label>
                        </div>
                    </div>
                    <input type="submit" value="sélectionner" id="sub">
                </div>
            </form>
    </div>
    <div class="filtre-cin">
        <form action="#" method="post">
            <div class="login-box" id="login-box1">
                <div class="user-box">
                    <input list="cin" name="cin" id="input1" required>
                    <datalist id="cin">
                        <?php  
                            foreach ($reponse2222 as $r2222):
                                $cinnn = $r2222['cin'];
                                echo "<option id ='77' value='$cinnn'></option>"  ;
                            endforeach;
                        ?>
                    </datalist>
 
                    <label>filtrer par C.I.N</label>
                    <div class="user-box">
                            <input type="date" id="start" name="start" >
                            <label>From</label>
                    </div>
                    <div class="user-box">
                            <input type="date" id="start" name="end" >
                            <label>To</label>
                    </div>
                </div>
                <input type="submit" value="sélectionner" id="sub1">
            </div>
        </form>
    </div>

</div>

<?php
    if(!empty($_POST['nom']))
    {
        $a['0'] = 1;
$i = 0;
        if(!empty($_POST['start']))
        {
            $start = $_POST['start']." 23:59:59";
        }
        else{
            $start = "2000-01-01 00:00:01";
        }
        if(!empty($_POST['end']))
        {
            $end = $_POST['end']." 23:59:59";
        }
        else{
            $end = date("Y-m-d") . " 23:59:59";
        }
        $nom = $_POST['nom']; 
        $nom1 = $_POST['nom']; 
        $reponse1 = $bdd->query("SELECT SUM(credit) AS `credit` FROM client WHERE `nom`='$nom' AND temps<='$end' AND temps>='$start' ");
        $donnes1 = $reponse1->fetch();
        $g1 = $donnes1['credit'];
        $reponse2 = $bdd->query("SELECT SUM(debit) AS `debit` FROM client WHERE `nom`='$nom' AND temps<='$end' AND temps>='$start'");
        $donnes2 = $reponse2->fetch();
        $g2 = $donnes2['debit'];

        $reponse3 = $bdd->query("SELECT * FROM client WHERE `nom`='$nom' AND temps<='$end' AND temps>='$start'");
        $reponse4 = $bdd->query("SELECT * FROM clients WHERE nom='$nom1'");
        $r333 = $reponse4->fetch();
        ?>
        <div class="per">
            <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>CIN</th>
                    <th>RIB</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><a href="modify-user.php?id=<?php echo $r333['id']?>"><?php echo $r333['nom']?></a></td>
                    <?php $nnn = $r333['nom']; $ccc = $r333['cin']; $rrr = $r333['rib'];?>
                    <td><?php echo $r333['cin']?></td>
                    <td><?php echo $r333['rib']?></td>
                    
                </tr>
            </tbody>
            </table>
        </div>
        <div class="mad">
            <table class="taaaable table-striped table-bordered" id="table_abc">
                <tr>
                    <th>Date</th>
                    <th>libelle</th>
                    <th>credit</th>
                    <th>debit</th>
                </tr> 
                <?php  foreach ($reponse3 as $r):  ?>
                <tr>
                    <?php $iid = $r['id'];
                    $i = $i + 1;
                    $a[$i] = $iid;?>
                    <td><a href="modify.php?id=<?php echo $iid?>&id1=<?php echo $r333['id']?>"><?php echo $r['temps'] ?></a></td>
                    <td style="width:250px; max-width:355px;"><?php echo $r['libelle'] ?></td>
                    <td><?php if($r['credit'] != "0"){echo number_format($r['credit'], 2)." dh";} else echo "-" ;?></td>
                    <td><?php if($r['debit'] != "0"){echo number_format($r['debit'], 2)." dh";} else echo "-" ;?></td>
                </tr> 
                <?php  endforeach;  ?>
                <tfoot>
                <tr>
                    <th scope="row" colspan="2">Totaux des operations</th>
                    <td><?php echo number_format($g1, 2) . " dh"?></td>
                    <td><?php echo number_format($g2, 2) . " dh"?></td>
                </tr>
            </tfoot>
            </table>
        </div>
        <?php
    }
    elseif(!empty($_POST['cin']))
    {

$a['0'] = 1;
$i = 0;
        if(!empty($_POST['start']))
        {
            $start = $_POST['start']." 23:59:59";
        }
        else{
            $start = "2000-01-01 00:00:01";
        }
        if(!empty($_POST['end']))
        {
            $end = $_POST['end']." 23:59:59";
            $endd;
        }
        else{
            $end = date("Y-m-d") . " 23:59:59";
        }
        $cin = $_POST['cin']; 
        $cin1 = $_POST['cin']; 
        $reponse1 = $bdd->query("SELECT SUM(credit) AS `credit` FROM client WHERE `cin`='$cin' AND temps<='$end' AND temps>='$start'");
        $donnes1 = $reponse1->fetch();
        $g1 = $donnes1['credit'];
        $reponse2 = $bdd->query("SELECT SUM(debit) AS `debit` FROM client WHERE `cin`='$cin' AND temps<='$end' AND temps>='$start'");
        $donnes2 = $reponse2->fetch();
        $g2 = $donnes2['debit'];

        $reponse3 = $bdd->query("SELECT * FROM client WHERE `cin`='$cin' AND temps<='$end' AND temps>='$start'");
        $reponse4 = $bdd->query("SELECT * FROM clients WHERE cin='$cin1'");
        $r333 = $reponse4->fetch();
        ?>
        <div class="per" >
            <table>
            <thead>
                <tr onclick="window.location=newPageLocation?value = this.innerHTML">
                    <th>Nom</th>
                    <th>CIN</th>
                    <th>RIB</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><a href="modify-user.php?id=<?php echo $r333['id']?>"><?php echo $r333['nom']?></a></td>
                    <td><?php echo $r333['cin']?></td>
                    <td><?php echo $r333['rib']?></td>
                </tr>
            </tbody>
            </table>
        </div>
        <div class="mad">
            <table class="taaaable table-striped table-bordered" id="table_abc">
                <tr>
                    <th>Date</th>
                    <th style="width:250px; max-width:355px;" >libelle</th>
                    <th>credit</th>
                    <th>debit</th>
                </tr> 
                <?php  foreach ($reponse3 as $r):  ?>
                <tr>
                <?php $iid = $r['id'];
                        $i = $i + 1;
                        $a[$i] = $iid;

                ?> 
                    <td><?php echo $r['temps'] ?></td>
                    <td><a href="modify.php?id=<?php echo $iid?>&id1=<?php echo $r333['id']?>"><?php echo $r['libelle'] ?></a></td>
                    <td><?php if($r['credit'] != "0"){echo number_format($r['credit'], 2)." dh";} else echo "-" ;?></td>
                    <td><?php if($r['debit'] != "0"){echo number_format($r['debit'], 2)." dh";} else echo "-" ;?></td>
                </tr> 
                <?php  endforeach;  ?>
                <tfoot>
                <tr>
                    <th scope="row" colspan="2">Totaux des operations</th>
                    <td><?php echo number_format($g1, 2) . " dh"?></td>
                    <td><?php echo number_format($g2, 2) . " dh"?></td>
                </tr>
            </tfoot>
            </table>
        </div>



 

        <?php
    } 
?>

</table>
<div class="print">
    <form action="print.php" method="post" target="_blank">
    <?php

    foreach($a as $value)
    {
        echo '<input type="hidden" name="result[]" value="'. $value. '">';
    }
    ?>
    <input type="hidden" value="<?php echo $g1?>" name="g1" id="">
    <input type="hidden" value="<?php echo $g2?>" name="g2" id="">
    <input type="hidden" value="<?php echo $nnn?>" name="nnn" id="">
    <input type="hidden" value="<?php echo $ccc?>" name="ccc" id="">
    <input type="hidden" value="<?php echo $rrr?>" name="rrr" id="">
    <input type="hidden" value="<?php echo $start?>" name="start" id="">
    <input type="hidden" value="<?php echo $end?>" name="end" id="">
    <input type="submit" value="Print" id="pr">
    </form>
</div>

<?php 
if(!empty($g1) || !empty($g2))
{
echo "
<div>
<h2>Solde au " ; echo $end. ' est de: ';
echo " <font size='6'  color='red'>"; echo number_format($g2 - $g1, 2) . " dh";echo"</font> </h2>
</div>";
}

?>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script>


$(function(){
    $('#input').change(function(){
        var t = $("#nom option[value='" + $('#input').val() + "']").attr('id');
        if(t == undefined)
        {
            document.getElementById('id011').style.display = "block";
            $( "#sub" ).prop( "disabled", true );
        }
        else{
            $( "#sub" ).prop( "disabled", false );
        }
    });
});

$(function(){
    $('#input1').change(function(){
        var t = $("#cin option[value='" + $('#input1').val() + "']").attr('id');
        if(t == undefined)
        {
            document.getElementById('id01').style.display = "block";
            $( "#sub1" ).prop( "disabled", true );
        }
        else{
            $( "#sub1" ).prop( "disabled", false );
        }
    });
});

</script>


<div id="id01" class="modal">
  <form class="modal-content animate" action="/action_page.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
	  <img src="../img/dd.png" alt="Avatar" class="avatar">
	  <h3>Pas d'utilisateure avec ce cin</h3>
    </div>
  </form>
</div>

<div id="id011" class="modal">
  <form class="modal-content animate" action="/action_page.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id011').style.display='none'" class="close" title="Close Modal">&times;</span>
	  <img src="../img/dd.png" alt="Avatar" class="avatar">
	  <h3>Pas d'utilisateure avec ce nom</h3>
    </div>
  </form>
</div>

<script>

var modal1 = document.getElementById('id01');
var modal11 = document.getElementById('id011');

window.onclick = function(event) {
    if (event.target == modal1) {
        modal1.style.display = "none";
    }
    if (event.target == modal11) {
        modal11.style.display = "none";
    }
}
</script>
<style>
/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 35%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

</style>



<?php
if(empty($_POST['nom']) && empty($_POST['cin'])){
    ?>
    <script>
        document.getElementById("pr").disabled = true;
    </script>
    <?php
}

