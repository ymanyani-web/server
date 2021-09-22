
<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=cafe;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}



?>





<!DOCTYPE HTML>

<html>
	<head>
		<title>cafe</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="assets/css/main.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet"> <!-- https://fonts.google.com/ -->
        <link rel="stylesheet" href="fontawesome/css/all.min.css"> <!-- https://fontawesome.com/ -->
        <link rel="stylesheet" href="assets/css/templatemo-ocean-vibes.css">

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
	    </style>
	</head>
	<body>
		<div class="page-wrap">

			<!-- Nav -->
            <?php include("includes/menu1.html"); ?>

			<!-- Main -->
				<section id="main">

					<!-- Header -->
						<header id="header">
							<div><span>Cafe</span></div>
						</header>

					<!-- Section -->
                        <div class="tm-container">
                            <nav class="tm-main-nav">
                                <ul id="inline-popups">
                                    <li class="tm-nav-item">
                                        <a href="view/start_service.php" data-effect="mfp-move-from-top" class="tm-nav-link">
                                            start service
                                            <i class="fas fa-3x fa-plus"></i>
                                        </a>                
                                    </li>
                                    <li class="tm-nav-item">
                                        <a href="view/fin_service.php" data-effect="mfp-move-from-top" class="tm-nav-link">
                                            fin service
                                            <i class="fas fa-3x fa-plus"></i>
                                        </a>                
                                    </li>
                                    <li class="tm-nav-item">
                                        <a href="view/index.php" data-effect="mfp-move-from-top" class="tm-nav-link" id="tm-gallery-link">
                                            products
                                            <i class="fas fa-3x fa-plus"></i>
                                        </a>
                                    </li>
                                    <li class="tm-nav-item">
                                        <a href="view/xreport.php" data-effect="mfp-move-from-top" class="tm-nav-link" id="tm-gallery-link">
                                            Xreport
                                            <i class="fas fa-3x fa-plus"></i>
                                        </a>
                                    </li>

                                </ul>
                            </nav>
                        </div>
                    
		</div>

	</body>
</html>