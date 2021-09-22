<?php 

require 'Models/User.php';

?>

<!DOCTYPE html>
<html>

<head>
    <title>YCommerce</title>
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" integrity="sha384-wESLQ85D6gbsF459vf1CiZ2+rr+CsxRY0RpiF1tLlQpDnAgg6rwdsUF1+Ics2bni" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
</head>
<body>
    
    <div class="MainContainer">

        <header>
            <div id="logo">
                <h2>Y•<span>Commerce</span></h2>
            </div>
            <nav>
                <a href="index.php"><i class="fa fa-home"></i> &nbsp; Home</a>
                <a href="shop.php"><i class="fab fa-shopify"></i> &nbsp; Products</a>
                <?php 
                if(isset($_SESSION['currentUser'])){
                    $usr = $_SESSION['currentUser'];
                ?>
                    <a href="profile.php"><img width="50" height="50" src="<?= $usr->ProfileImg ?>" /> &nbsp; <?= $usr->Name ?> </a>
                    <a href="cart.php"><i class="fas fa-shopping-cart"></i> &nbsp; Cart</a>
                    <a href="logout.php"><i class="fas fa-sign-out-alt"></i> &nbsp; Log out</a>
                <?php
                }
                else{?>
                    <a href="login.php"><i class="fa fa-user"></i> &nbsp; Sign In</a>
                    <a href="register.php"><i class="fa fa-lock"></i> &nbsp; Sign Up</a>
                <?php
                }
                ?>
            </nav>
        </header>