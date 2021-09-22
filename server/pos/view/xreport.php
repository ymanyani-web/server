
<?php
date_default_timezone_set('Africa/Casablanca');
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=cafe;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
$personnel = $bdd->query("SELECT * FROM personnel");



?>





<!DOCTYPE HTML>

<html>
	<head>
		<title>Gallery</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="../assets/css/main.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <style>
        html, body, #main{
            height:100%;
            width:100%;
        }
        .onglet
        {
                display:inline-block;
                margin-left:3px;
                margin-right:3px;
                padding:3px;
                border:1px solid black;
                cursor:pointer;
        }
        .onglet_0
        {
                background:#bbbbbb;
                border-bottom:1px solid black;
        }
        .onglet_1
        {
                background:#dddddd;
                border-bottom:0px solid black;
                padding-bottom:4px;
        }
        .contenu_onglet
        {
                background-color:#dddddd;
                border:1px solid black;
                margin-top:-1px;
                padding:5px;
                display:none;
        }
            .grid { 
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            grid-gap: 20px;
            align-items: stretch;

            }
            .grid img {
            border: 1px solid #ccc;
            box-shadow: 2px 2px 6px 0px  rgba(0,0,0,0.3);
            max-width: 100%;
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
  .trrr:hover{
     border: 1px solid black
  }
	    </style>
	</head>
	<body>
		<div class="page-wrap">

			<!-- Nav -->
            <?php include("../includes/menu3.html"); ?>

			<!-- Main -->
				<section id="main">

					<!-- Header -->
						<header id="header">
							<div><span>Cafe</span></div>
						</header>

					<!-- Section -->
                    <body>
                        <div class="filtre">
                            <form action="#" method="POST">
                                <label for="start">Select personnel</label>
                                <input list="personnel" name="waiter_id">
                                <datalist id="personnel">
                                    <?php foreach ($personnel as $r):  ?>
                                        <option value="<?php echo $r['nom'] ?>">
                                    <?php  endforeach;  ?> 
                                </datalist>
                                <input type="submit">
                            </form>
                        </div>


    <?php
    if(isset($_POST['waiter_id']))
    {
        $nom = $_POST['waiter_id'];
        $service = $bdd->query("SELECT * FROM `service` WHERE nom_personnel = '$nom' ORDER BY id DESC LIMIT 1");
        $ss = $service->fetch();
        $start = $ss['date_debut'];
        $end = date("Y-m-d H:i").":59";
        $result = $bdd->query("SELECT * FROM commands WHERE nom_waiter='$nom' AND `temps`<='$end' AND `temps`>='$start' ORDER BY temps  DESC");
    ?>
    <div class="mad">
            <table class="taaaable table-striped table-bordered" id="table_abc">
                <tr>
                    <th>Produits</th>
                    <th>quantite</th>
                    <th>prix</th>
                    <th>temps</th>
                </tr> 
                <?php  foreach ($result as $rs):  ?>
                <tr onclick="window.location = 'http\:\/\/www.google.com'" class="trrr">
                    <?php $temps = substr($rs['temps'], 11,-3)?>
                    <td><?php echo $rs['nom_produit'] ?></td>
                    <td><?php echo $rs['quantite'] ?></td>
                    <td><?php echo $rs['prix_t'] ?></td>
                    <td><?php echo $temps; ?></td>
                </tr> 
                <?php  endforeach;  ?>
            </table>
        </div>
        <?php
        $reponse1 = $bdd->query("SELECT SUM(prix_t) AS `prix_t` FROM commands WHERE nom_waiter='$nom' AND `temps`<='$end' AND `temps`>='$start'");
        $donnes1 = $reponse1->fetch();
        ?>
        <div id="total">
            <span style="font-size:20px;">Total d'aujoud'hui: </span><span style="font-size:35px; color: green;"><?php echo number_format($donnes1['prix_t'], 2)." dh"?></span>
            <span><?php if($ss['date_fin'] != "0001-01-01 01:01:00"){ echo "(regle)";}?></span>
        </div>
        
    <?php
    }
    ?>

                    
		</div>

	</body>
</html>