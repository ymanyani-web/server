<?php
require 'Models/User.php';
?>
<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <div class="logo"><a href="index.php"><img src="images/logo.png"></a></div>
        </div>
        <div class="col-sm-9">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-item nav-link" href="index.php">Home</a>
                        <?php
                        if (isset($_SESSION['currentUser'])) {
                            $usr = $_SESSION['currentUser'];
                        ?>
                            <img width="50" height="50" src="<?= $usr->ProfileImg ?>" /> &nbsp; <span style="color: white;"><?= $usr->Name ?></span>
                            <a href="#" class="nav-item nav-link"> Cart</a>
                            <a href="logout.php" class="nav-item nav-link"> Log out</a>
                        <?php
                        } else { ?>
                            <a href="signin.php" class="nav-item nav-link">Sign In</a>
                            <a href="signup.php" class="nav-item nav-link">Sign Up</a>
                        <?php
                        }
                        ?>
                        <a class="nav-item nav-link last" href="#"><img src="images/search_icon.png"></a>
                        <a class="nav-item nav-link last" href="shop.php"><img src="images/shop_icon.png"></a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>