<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>App </title>
	

	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Bootstrap  -->
	<link rel="stylesheet" href="../css/bootstrap.css">
	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="../css/owl.carousel.css">
	<link rel="stylesheet" href="../css/owl.theme.default.min.css">
	<!-- Animate.css -->
	<link rel="stylesheet" href="../css/animate.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

	<!-- Theme style  -->
    <link rel="stylesheet" href="../css/style.css">
    
	<!-- My style  -->
	<link rel="stylesheet" href="../css/my.css">

</head>
<body>


<div id="page-wrap">


	<!-- ==========================================================================================================
													   MENU
		 ========================================================================================================== -->

	<div id="fh5co-hero-wrapper">
		<nav class="container navbar navbar-expand-lg main-navbar-nav navbar-light">
			<a class="navbar-brand" href="../view/admin.php">App( admin mode )</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				
				
			</div>
        </nav>
        <div class=""> 
            <form action="../controller/r.php" method="post">
                <input type="password" id="usr" name="pin" placeholder="Pin.." required></br>
                <input type="number" name="quantite" value="1" min="1">
                <input type="text" name="c_b" placeholder="Code barre" required></br>
                <input id="saveForm" name="signin-btn" type="submit" value="Return" />
            </form>
        </div>
    </body>














    <div class="exit">
        <a href="../controller/exit.php" id="a11">exit</a>
    </div>
    <style>
    .exit{
        position: fixed;
        right: 15px;
        bottom: 10px;
        font-size: 20px;
    }
    #a11{
        color: red; 

    }
    </style>
