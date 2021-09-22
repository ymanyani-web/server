<!-- <a href="intervention.php">Intervention</a>
<a href="facture.php">Facture</a> -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="assets/css1/templatemo-ocean-vibes.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/fontawesome/css/all.min.css"> <!-- https://fontawesome.com/ -->
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet"> <!-- https://fonts.google.com/ -->
    <title>????????????</title>
</head>

<body>
    <header>

    </header>
    <div class="tm-container">
        <nav class="tm-main-nav">
            <ul id="inline-popups">
                <li class="tm-nav-item">
                    <a href="index.php" data-effect="mfp-move-from-top" class="tm-nav-link">
                        Home
                        <i class="fas fa-3x fa-cog"></i>
                    </a>
                </li>
                <li class="tm-nav-item">
                    <a href="config/stock.php" data-effect="mfp-move-from-top" class="tm-nav-link">
                        Entree stock
                        <i class="fas fa-3x fa-file-alt"></i>
                    </a>
                </li>
                <li class="tm-nav-item">
                    <a href="config/client.php" data-effect="mfp-move-from-top" class="tm-nav-link">
                        Ajouter client
                        <i class="fas fa-3x fa-file-alt"></i>
                    </a>
                </li>
                <li class="tm-nav-item">
                    <a href="config/fournisseur.php" data-effect="mfp-move-from-top" class="tm-nav-link">
                        Ajouter un fournisseur
                        <i class="fas fa-3x fa-file-alt"></i>
                    </a>
                </li>
                <li class="tm-nav-item">
                    <a href="config/products.php" data-effect="mfp-move-from-top" class="tm-nav-link" id="tm-gallery-link">
                        Ajouter produits
                        <i class="far fa-3x fa-file-alt"></i>
                    </a>
                </li>
                <li class="tm-nav-item">
                    <a data-effect="mfp-move-from-top" class="tm-nav-link" id="tm-gallery-link" onclick="document.getElementById('id011').style.display='block'">
                        Ajouter categorie de piece
                        <i class="far fa-3x fa-file-alt"></i>
                    </a>
                </li>
                <li class="tm-nav-item">
                    <a data-effect="mfp-move-from-top" class="tm-nav-link" id="tm-gallery-link" onclick="document.getElementById('id012').style.display='block'">
                        Ajouter marque de vehicule
                        <i class="far fa-3x fa-file-alt"></i>
                    </a>
                </li>
                <li class="tm-nav-item">
                    <a data-effect="mfp-move-from-top" class="tm-nav-link" id="tm-gallery-link" onclick="document.getElementById('id013').style.display='block'">
                        Ajouter marque de piece
                        <i class="far fa-3x fa-file-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <div id="id011" class="modal">
        <form class="modal-content animate" action="controller/add.php?type=1" method="post">
            <div class="imgcontainer">
                <span onclick="document.getElementById('id011').style.display='none'" class="close" title="Close Modal">&times;</span>
                    <label for="nom"> nom : </label>
                    <input type="text" name="nom" id="nom">
                    <input type="submit" name="" id="" value="ajouter">
            </div>
        </form>
    </div>
    <div id="id012" class="modal">
        <form class="modal-content animate" action="controller/add.php?type=2" method="post">
            <div class="imgcontainer">
                <span onclick="document.getElementById('id012').style.display='none'" class="close" title="Close Modal">&times;</span>
                    <label for="nom"> nom : </label>
                    <input type="text" name="nom" id="nom">
                    <input type="submit" name="" id="" value="ajouter">
            </div>
        </form>
    </div>
    <div id="id013" class="modal">
        <form class="modal-content animate" action="controller/add.php?type=3" method="post">
            <div class="imgcontainer">
                <span onclick="document.getElementById('id013').style.display='none'" class="close" title="Close Modal">&times;</span>
                    <label for="nom"> nom : </label>
                    <input type="text" name="nom" id="nom">
                    <input type="submit" name="" id="" value="ajouter">
            </div>
        </form>
    </div>
    <script>
        var modal11 = document.getElementById('id011');
        var modal12 = document.getElementById('id012');
        var modal13 = document.getElementById('id013');

        window.onclick = function(event) {
            if (event.target == modal11) {
                modal11.style.display = "none";
            }
            if (event.target == modal12) {
                modal12.style.display = "none";
            }
            if (event.target == modal13) {
                modal13.style.display = "none";
            }
        }
    </script>
    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto 15% auto;
            /* 5% from the top, 15% from the bottom and centered */
            border: 1px solid #888;
            width: 35%;
            /* Could be more or less, depending on screen size */
        }

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
            from {
                -webkit-transform: scale(0)
            }

            to {
                -webkit-transform: scale(1)
            }
        }

        @keyframes animatezoom {
            from {
                transform: scale(0)
            }

            to {
                transform: scale(1)
            }
        }

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
    </style>

</body>

</html>