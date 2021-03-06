<!DOCTYPE html>
<html>
<head>
    <title>Page Title</title>
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" integrity="sha384-wESLQ85D6gbsF459vf1CiZ2+rr+CsxRY0RpiF1tLlQpDnAgg6rwdsUF1+Ics2bni" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    
</head>
<body>
    <div class="MainContainer">
        <div class="login-card">
            <div class="row">
                <div class="col-5">
                    <img width="350" height="400" src="https://us.123rf.com/450wm/llesia/llesia1512/llesia151200035/49501732-concept-achats-en-ligne-et-le-commerce-%C3%A9lectronique-ic%C3%B4nes-pour-le-marketing-mobile-une-main-tenant-un-t%C3%A9l%C3%A9.jpg?ver=6" alt=""/>
                </div>
                <div class="col-7">
                    <div class="loginForm">
                        <h2>Sign in to your account</h2>
                        <form action="login_controller.php" method="POST">
                            <div>
                            <label for="email">Email:</label>
                            <input type="text" value="" placeholder="E-Mail" name="email">
                            </div>
                            <div>
                            <label for="pass">Password:</label>
                            <input type="password" value="" placeholder="Password" name="pass">
                            </div>
                            <?php
                                $err = isset($_GET['error']) ?  $_GET['error'] : "";
                            ?>
                            <p style="color:red"><?= $err ?></p>
                            <input type="submit" value="Login" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>