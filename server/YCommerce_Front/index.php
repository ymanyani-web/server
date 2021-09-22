<?php session_start();
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
</head>
<body>
    
    <div class="MainContainer">

        <header>
            <div id="logo">
                <h2>Y•<span>Commerce</span></h2>
                <?php
                if(isset($_SESSION['username']))
                {
                    echo "Bienvenue ". $_SESSION['username'] ;
                }
                ?>
            </div>
            <nav>
                <a href="index.html"><i class="fa fa-home"></i> &nbsp; Home</a>
                <a href="shop.html"><i class="fab fa-shopify"></i> &nbsp; Products</a>
                <?php 
                    if(isset($_SESSION['username']))
                    {
                        echo "<a href='backend/logout.php'><i class='fa fa-user'></i> &nbsp; logOut</a>";
                    }
                    else{
                        echo "<a href='login.html'><i class='fa fa-user'></i> &nbsp; Sign In</a>
                        <a href='register.html'><i class='fa fa-lock'></i> &nbsp; Sign Up</a>";
                    }
                ?>
            </nav>
        </header>
<div id="slider">
    <div id="slider-text">
        <h1>We believe <br />in quality design</h1>
        <p>Any creation project is unique and should be <br/>provided with the appropriate quality</p>
        <input type="submit" value="Purchase Now" />
    </div>
    <img src="./images/slider_img.png" alt="Main Slider Image" />
</div>
<div id="about">
    <div id="services">
        <div class="service">
            <h3> <span class="fa fa-exchange"></span>  Responsive Design </h3>
            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
        </div>
        <div class="service">
            <h3> <span class="fa fa-car"></span> Revolution Slider </h3>
            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
        </div>
        <div class="service">
            <h3> <span class="fa fa-star"></span> Wide range of color </h3>
            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
        </div>
    </div>

    <div id="gallery">
        <img src="./images/projects/project_01.jpg" alt="Project 1" />
        <img src="./images/projects/project_02.jpg" alt="Project 2" />
        <img src="./images/projects/project_03.jpg" alt="Project 3" />
        <img src="./images/projects/project_04.jpg" alt="Project 4" />
    </div>

    <div id="sponsors">
        <img src="./images/sponsors/logo_list_01.png" alt="" />
        <img src="./images/sponsors/logo_list_02.png" alt="" />
        <img src="./images/sponsors/logo_list_03.png" alt="" />
        <img src="./images/sponsors/logo_list_04.png" alt="" />
        <img src="./images/sponsors/logo_list_05.png" alt="" />
    </div>
</div>  
<footer>
            <div id="footer-top">
                <div class="footer-text">
                    <h2 id="logo-footer">Y•<span>Commerce</span></h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    </p>
                </div>
                <div class="footer-text">
                    <h3>Latest Tweets</h3>
                </div>
                <div class="footer-text">
                    <h3>Recent Posts</h3>
                    <p><strong>Publish What You Learn</strong></p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt</p>
                    <p><strong>Redisigning With Persobnality</strong></p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt, sed do eiusmod tempor incididunt</p>
                </div>
                <div class="footer-text gallery-bottom">
                    <h3>Photo Stream</h3>
                    <img src="./images/projects/project_01.jpg" alt="Project 1" />
                    <img src="./images/projects/project_02.jpg" alt="Project 2" />
                    <img src="./images/projects/project_03.jpg" alt="Project 3" />
                    <img src="./images/projects/project_04.jpg" alt="Project 4" />
                    <img src="./images/projects/project_04.jpg" alt="Project 1" />
                    <img src="./images/projects/project_03.jpg" alt="Project 2" />
                    <img src="./images/projects/project_02.jpg" alt="Project 3" />
                    <img src="./images/projects/project_01.jpg" alt="Project 4" />
                </div>
            </div>
            <div id="footer-bottom">
                <div id="credits">
                        <p> &copy; Revision Copyright - All Rights reserved</p>
                        <p>Legal Notice</p>
                        <p>Terms and Conditions</p>
                </div>
                <div id="social">
                    <a href="#" class="fa fa-facebook-official"></a>
                    <a href="#" class="fa fa-twitter"></a>
                    <a href="#" class="fa fa-linkedin"></a>
                    <a href="#" class="fa fa-instagram"></a>
                </div>
            </div>
        </footer>

    </div>
</body>
</html>