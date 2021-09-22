<?php
session_start();
$_SESSION['tst']  = "okk";

try {
    $bdd = new PDO('mysql:host=localhost;dbname=cafe;charset=utf8', 'root', 'root');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
$categories = $bdd->query("SELECT * FROM categories");
$categories1 = $bdd->query("SELECT * FROM categories");
?>





<!DOCTYPE HTML>

<html>

<head>
    <title>cafe</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="../assets/css/main.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript">
        //<!--
        function change_onglet(name) {
            document.getElementById('onglet_' + anc_onglet).className = 'onglet_0 onglet';
            document.getElementById('onglet_' + name).className = 'onglet_1 onglet';
            document.getElementById('contenu_onglet_' + anc_onglet).style.display = 'none';
            document.getElementById('contenu_onglet_' + name).style.display = 'block';
            anc_onglet = name;
        }
        //-->
    </script>

    <style>
        html,
        body,
        #main {
            height: 100%;
            width: 100%;
        }

        .onglet {
            display: inline-block;
            margin-left: 3px;
            margin-right: 3px;
            padding: 3px;
            border: 1px solid black;
            cursor: pointer;
        }

        .onglet_0 {
            background: #bbbbbb;
            border-bottom: 1px solid black;
        }

        .onglet_1 {
            background: #dddddd;
            border-bottom: 0px solid black;
            padding-bottom: 4px;
        }

        .contenu_onglet {
            background-color: #dddddd;
            border: 1px solid black;
            margin-top: -1px;
            padding: 5px;
            display: none;
            width: 82%;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            grid-gap: 20px;
            align-items: stretch;

        }

        .grid img {
            border: 1px solid #ccc;
            box-shadow: 2px 2px 6px 0px rgba(0, 0, 0, 0.3);
            max-width: 100%;
        }
    </style>
</head>
<?php
if (isset($_GET['error'])) {
    if ($_GET['error'] == 'start_service_first') {
        echo "<body onload='document.getElementById(\"start_service\").style.display=\"block\"' style='width:auto;'>";
    }
} else {
    echo "<body onclick='openFullscreen();'>";
}
?>
<div class="page-wrap">

    <!-- Nav -->
    <?php include("../includes/menu2.html"); ?>

    <!-- Main -->
    <section id="main">

        <!-- Header -->
        <header id="header">
            <div><span>Cafe</span></div>
        </header>

        <!-- Section -->

        <div class="systeme_onglets">
            <div class="onglets">
                <?php foreach ($categories as $r) :  ?>
                    <span class="onglet_0 onglet" id="onglet_<?php echo $r['categorie'] ?>" onclick="javascript:change_onglet('<?php echo $r['categorie'] ?>');"><?php echo $r['categorie'] ?></span>
                <?php endforeach;  ?>
            </div>
            <div class="contenu_onglets">
                <?php foreach ($categories1 as $r1) :  ?>
                    <div class="contenu_onglet" id="contenu_onglet_<?php echo $r1['categorie'] ?>">
                        <?php
                        $cat = $r1['categorie'];
                        $products = $bdd->query("SELECT * FROM products WHERE category = '$cat' order by nom");
                        ?>
                        <main class="grid">
                            <?php foreach ($products as $p) :  ?>
                                <div class="img" id="<?php echo $p['id'] ?>">
                                    <a><img src="<?php echo $p['img'] ?>" width="250px" height="175px" alt=""></a>
                                    <h4><?php echo $p['nom'] ?></h4>
                                </div>
                            <?php endforeach;  ?>
                        </main>
                    </div>
                <?php endforeach;  ?>
            </div>
        </div>
        <script type="text/javascript">
            var anc_onglet = 'petit_dejeuner';
            change_onglet(anc_onglet);
        </script>
    </section>
</div>
<div id="recu">

    <h2>Recu</h2>
    <div>
        <?php
        for ($i = 1; $i <= 1000; $i++) {
            if (isset($_SESSION["command$i"])) {
                $res = $_SESSION["command$i"];
                echo $res['nom'];
                echo '<br/>';
            }
            if (!isset($_SESSION["command$i"])) {
                break;
            }
        }
        ?>
    </div>
    <div class="finish" style="bottom: 10px; right:5px; position: fixed;">
        <button onclick="test()">Terminer</button>
    </div>
</div>
<button onclick="openFullscreen();">Open Fullscreen</button>
<div id="start_service" class="modal">
    <div class="modal-content animate" action="/action_page.php" method="post">
        <div>
            <h2>Start service First</h2>
        </div>
    </div>
</div>
<div id="id01" class="modal">
    <form class="modal-content animate" action="/action_page.php" method="post">
        <div class="imgcontainer">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
            <img src="../img/error.png" alt="Avatar" class="avatar">
            <h3>l'utilisateure a ete ajoute</h3>
        </div>
    </form>
</div>
<div id="id01" class="modal">
    <div class="modal-content animate" action="/action_page.php" method="post">
        <div>
            <h2>Quantite</h2>
            <center><i class="fa fa-minus" aria-hidden="true" onclick="minus()"> </i><input type="number" name="number" id="number" value="1" min="1"> <i class="fa fa-plus" aria-hidden="true" onclick="add()"></i></center>
            <center>
                <div class="sub"><input type="submit" name="" id=""></div>
            </center>
        </div>
    </div>
</div>
<div id="id02" class="modal">
    <div class="modal-content animate" style="width:30%" action="/action_page.php" method="post">
        <div>
            <h2>Password</h2>
            <script></script>
            <form action="../controller1/finish_command.php" method="post">
                <center><input type="password" id="password" name="password"></center>
                <center>
                    <div class=""> <input type="submit"></div>
                </center>
            </form>
        </div>
    </div>
</div>
<style>
    .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.4);
        /* Black w/ opacity */
        padding-top: 60px;
    }

    .modal-content {
        background-color: #fefefe;
        margin: 5% auto 15% auto;
        /* 5% from the top, 15% from the bottom and centered */
        border: 1px solid #888;
        width: 20%;
        /* Could be more or less, depending on screen size */
    }

    .sub {
        margin-top: 10px;
    }
</style>
</body>

</html>





<script>
    var elem = document.documentElement;

    function openFullscreen() {
        /* if (elem.requestFullscreen) {
          elem.requestFullscreen();
        } else if (elem.webkitRequestFullscreen) { 
          elem.webkitRequestFullscreen();
        } else if (elem.msRequestFullscreen) { 
          elem.msRequestFullscreen();
        } */
    }

    function closeFullscreen() {
        if (document.exitFullscreen) {
            document.exitFullscreen();
        } else if (document.webkitExitFullscreen) {
            /* Safari */
            document.webkitExitFullscreen();
        } else if (document.msExitFullscreen) {
            /* IE11 */
            document.msExitFullscreen();
        }
    }
</script>






<script>
    $(".img").click(function() {
        document.getElementById('id01').style.display = 'block'
        window.value = this.id
    });
    /* $(".finish").click(function(){
            document.getElementById('id02').style.display='block'
    }); */
    $(".sub").click(function() {
        var inputVal = document.getElementById("number").value;
        $.get("../controller1/add_command.php?idd=" + window.value + "&num=" + inputVal, function(data, status) {
            /* alert("Data: " + data + "\nStatus: " + status); */
            if (status == 'success') {
                $("#recu").load(window.location.href + " #recu");
                document.getElementById("number").value = 1;
                document.getElementById('id01').style.display = 'none'
            }
        });
    });

    function test() {
        document.getElementById('id02').style.display = 'block'
        $("#password").focus();
    }
    /*  $(".del").click(function(){
         var btn = this;
         $.get("../controller/delete.php?img="+this.id, function(data, status){
             //alert("Data: " + data + "\nStatus: " + status);
             if (status == 'success')
                 $(btn).closest('.holder').remove();
         });
     }); */
    function add() {
        document.getElementById("number").value = parseInt(document.getElementById("number").value) + 1;
    }

    function minus() {
        if (parseInt(document.getElementById("number").value) > 1) {
            document.getElementById("number").value = parseInt(document.getElementById("number").value) - 1;
        }
    }
</script>
<script>
    var modal = document.getElementById('id01');
    var modal2 = document.getElementById('id02');
    var modal3 = document.getElementById('start_service');
    window.onclick = function(event) {
        console.log(event.target);
        if (event.target == modal) {
            document.getElementById("number").value = 1;
            modal.style.display = "none";
        }
        if (event.target == modal2) {
            modal2.style.display = "none";
        }
        if (event.target == modal3) {
            modal3.style.display = "none";
        }
    }
</script>