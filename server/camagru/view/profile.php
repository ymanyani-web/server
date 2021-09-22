<?php
session_start();
$s = $_SESSION['user'];
if(!isset($_SESSION['user']))
{
    echo "<script type='text/javascript'>alert('only members are allowed to access to this page, log in if u re or sign up if ur not!');</script>";
    //require('../index.php');
    //
    ?><script> window.history.back();</script><?php
}
?>


<?php
$db = mysqli_connect('localhost', 'server', 'server123', 'camagru');
$results = mysqli_query($db, "SELECT * FROM images WHERE username='$s' ORDER BY id DESC LIMIT 3");
$images = mysqli_fetch_all($results, MYSQLI_ASSOC);
?>


<!DOCTYPE HTML>

<html>
	<head>
		<title>PROFILE</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="../assets/css/main.css" />
        <script type="text/javascript" src="../assets/js/webcam.js"></script>
    </head>
    <style>
            .grid { 
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            grid-gap: 20px;
            align-items: stretch;
            padding-bottom: 100px;
            position: absolute;
            bottom: 0;
            right: 100px;
            left:60px;
            }
            .grid img {
            border: 1px solid #ccc;
            box-shadow: 2px 2px 6px 0px  rgba(0,0,0,0.3);
            max-width: 100%;
            }
	    </style>
	<body>
		<div class="page-wrap">

			<!-- Nav -->
            <?php include("../includes/menu2.html"); ?>


			<!-- Main -->
				<section id="main">

					<!-- Header -->
						<header id="header">
							<div><span>Camagru</span></div>
						</header>

					<!-- Section -->
						<section class="ttt">
                            
                            <div><h1>Take a picture with ur webcam</h1></div>
                            <div class="cam">
                                <div id="my_camera"></div>
                                <input type=button value="Take Snapshot" onClick="take_snapshot()">
                                <div id="results" ></div>
                            </div>
                            <form id='post' action='../controller/save_pic.php' method='post' enctype='multipart/form-data'>
                                <div id="img-superpose">
                                    <ul>
                                        <li><label><input type="radio" name="alpha" value="1" onclick="func('1')"><img style="width: 100px;" src="../img/alpha/1.png"></label></li>
                                        <li><label><input type="radio" name="alpha" value="2" onclick="func('2')"><img style="width: 100px;" src="../img/alpha/2.png"></label></li>
                                        <li><label><input type="radio" name="alpha" value="3" onclick="func('3')"><img style="width: 100px;" src="../img/alpha/3.png"></label></li>
                                        </br>
                                        <li><label><input type="radio" name="alpha" value="4" onclick="func('4')" checked>Nothing</label></li>
                                    </ul>
                                </div>
                                <div class="upl">
                                    <h1>Or upload a img</h1>
                                    <input class="btn btn-info" type="file" id='upload' onClick='clear_img()' name="webcam" accept="image/*">
                                </div>
                                <input type=button id="pub" name='publish' value="Publish" onClick="post()" id ="pub" disabled><br>
                            </form>

						</section>

                        <section class="grid">
                            <?php foreach ($images as $image): ?>
                                <div class="holder">
                                    <div class="img">
                                        <a href="comments.php?imageid=<?php echo $image['id']; ?>"><img src="<?php echo '../img/' . $image['image'] ?>" width="250px" height="175px" alt=""></a>
                                        <?php
                                        if(isset($_GET['user']) && ($_GET['user'] == $_SESSION['user']))
                                        {
                                        ?>
                                            <br/><button class="del" id="<?php echo $image['id'] ?>" >Delete</button>  
                                        <?php
                                        }  
                                        if(isset($_GET['user']) && ($_GET['user'] != $_SESSION['user']))
                                        {
                                        ?>
                                            <div class="lk" id="<?php echo $image['id'] ?>">
                                            <a><img src="../img/alpha/like.png"></a><p  style="color:#47FF13;">[<?php echo $image['like_n']; ?>]</p>
                                            </div>
                                            <?php
                                        }  
                                        ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <a href="my_profile.php?user=<?php echo $s ?>"> All </a>
                        </section>

					<!-- Footer -->
                    <?php include("../includes/footer.html"); ?>
				</section>
		</div>

	</body>
</html>
















       <!-- Webcam.min.js -->

<!-- Configure a few settings and attach camera -->
<script language="JavaScript">
    Webcam.set({
    width: 320,
    height: 240,
    image_format: 'jpeg',
    jpeg_quality: 90
    });
    Webcam.attach( '#my_camera' );
    var img;
    /* Code to handle taking the snapshot and displaying it locally*/
    function take_snapshot() {
        // take snapshot and get image data
        Webcam.snap( function(data_uri) {
            // display results in page
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';

            img = data_uri;

            document.getElementById('upload').value = '';
            document.getElementById('pub').disabled = false;
        } );
    }

    var s = '4';

    function func(intValue)
    {
     s = intValue;
    }            

    function post()
    {
        if (document.getElementById("upload").files.length == 0)
        {
            Webcam.upload( img, '../controller/save_pic.php?sup='+ s, function(code, text) {
                alert("your img have been successfully  posted");
                window.location.replace("gallery.php");
            } );
        }
        else
        {
            document.getElementById("post").submit();
        }
    }
    
    function clear_img()
    {
        document.getElementById('results').innerHTML = '';
        document.getElementById('pub').disabled = false;
    }

</script>