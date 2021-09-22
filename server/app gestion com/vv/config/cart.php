<?php
session_start();
//session_destroy();
try {
    $pdo = new PDO('mysql:host=localhost;dbname=gestion;charset=utf8', 'root', 'root');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
$list1 = $pdo->query("SELECT * FROM users");
$list2 = $pdo->query("SELECT * FROM client");

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $stmt = $pdo->prepare('SELECT * FROM products WHERE id = ?');
    $stmt->execute([$id]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    $quantity = isset($_GET['q']) ? $_GET['q'] : 1;
    $tr = isset($_GET['t']) ? $_GET['t'] : 1;
    if ($product && $quantity > 0) {
        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
            if (array_key_exists($id, $_SESSION['cart'])) {
                //$_SESSION['cart'][$id][0] += $quantity;
                echo "error";
                exit;
            } else {
                $_SESSION['cart'][$id][0] = $quantity;
                $_SESSION['cart'][$id][1] = $tr;
            }
        } else {
            $_SESSION['cart'] = array($id => array($quantity, $tr));
        }
    }
    echo "good";
    // header('location: operation.php');
    exit;
}


if (isset($_GET['remove']) && is_numeric($_GET['remove']) && isset($_SESSION['cart']) && isset($_SESSION['cart'][$_GET['remove']])) {
    unset($_SESSION['cart'][$_GET['remove']]);
}

if (isset($_POST['update']) && isset($_SESSION['cart'])) {
    foreach ($_POST as $k => $v) {
        if (strpos($k, 'quantity') !== false && is_numeric($v)) {
            $id = str_replace('quantity-', '', $k);
            $quantity = (int)$v;
            if (is_numeric($id) && isset($_SESSION['cart'][$id]) && $quantity > 0) {
                $_SESSION['cart'][$id][0] = $quantity;
            }
        }
        if (strpos($k, 'tr') !== false && is_numeric($v)) {
            $id = str_replace('tr-', '', $k);
            $tr = (int)$v;
            if (is_numeric($id) && isset($_SESSION['cart'][$id]) && $tr >= 0) {
                $_SESSION['cart'][$id][1] = $tr;
            }
        }
    }
    header('location: cart.php');
    exit;
}


$products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
$products = array();
$subtotal = 0.00;
// If there are products in cart
if ($products_in_cart) {
    $array_to_question_marks = implode(',', array_fill(0, count($products_in_cart), '?'));
    $stmt = $pdo->prepare('SELECT * FROM products WHERE id IN (' . $array_to_question_marks . ')');
    $stmt->execute(array_keys($products_in_cart));
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($products as $product) {
        $subtotal += (float)$product['pu'] * (int)$products_in_cart[$product['id']][0] - ((float)$product['pu'] * (int)$products_in_cart[$product['id']][0] * (float)$products_in_cart[$product['id']][1] * 0.01);
    }
}
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Burger King - Food Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="../img/favicon.ico" rel="icon">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Nunito:600,700" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="../lib/animate/animate.min.css" rel="stylesheet">
    <!-- <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../lib/flaticon/font/flaticon.css" rel="stylesheet"> -->
    <!--   <link href="../lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" /> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <!-- Template Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
</head>

<body>

    <!-- Nav Bar Start -->
    <div class="navbar navbar-expand-lg bg-light navbar-light">
        <div class="container-fluid">
            <a href="../index.php" class="navbar-brand">Union pièces <span>agricoles</span></a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav ml-auto">
                    <a href="../index.php" class="nav-item nav-link active">Home</a>
                    <a href="../admin.php" class="nav-item nav-link">Admin</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Nav Bar End -->


    <!-- Page Header Start -->
    <div class="page-header mb-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>B.C</h2>
                </div>
                <div class="col-12">
                    <a href=""></a>
                    <a href=""></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <form action="#" method="post">
        <table style="width: 100%;">
            <thead>
                <tr>
                    <td colspan="">Product</td>
                    <td>Price</td>
                    <td>casier</td>
                    <td>Quantity</td>
                    <td>taux de remise</td>
                    <td>Total</td>
                    <td>remove</td>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($products)) : ?>
                    <tr>
                        <td colspan="5" style="text-align:center;">Pas de produit (en cas de probleme veuillez nous contacter)</td>
                    </tr>
                <?php else : ?>
                    <?php foreach ($products as $product) : ?>
                        <tr>
                            <td>
                                <a href="product-details.php?id=<?= $product['id'] ?>"><?= $product['designation'] ?></a>
                            </td>
                            <td class="price"><?= $product['pu'] ?> Dh</td>
                            <td><?= $product['casier'] ?></td>
                            <td class="quantity">
                                <input type="number" name="quantity-<?= $product['id'] ?>" value="<?= $products_in_cart[$product['id']][0] ?>" min="1" max="<?= $product['quantite'] ?>" placeholder="Quantity" required>
                            </td>
                            <td class="tr">
                                <input type="number" name="tr-<?= $product['id'] ?>" value="<?= $products_in_cart[$product['id']][1] ?>" min="0" max="<?= $product['taux_remise'] ?>" placeholder="taux de remise" required> %
                            </td>
                            <td class="price"><?= ($product['pu'] * $products_in_cart[$product['id']][0]) - ($product['pu'] * $products_in_cart[$product['id']][0] * $products_in_cart[$product['id']][1] * 0.01) ?> Dh</td>
                            <td>
                                <a href="cart.php?remove=<?= $product['id'] ?>" class="remove">Remove</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
        <div class="subtotal">
            <span class="text">total</span>
            <span class="price"><?= $subtotal ?> Dh</span>
        </div>
        <div class="buttons">
            <input type="submit" class="button" value="Update" name="update">
    </form>
    <button type="button" onclick="document.getElementById('idg1').style.display = 'block';" class="button" style=" position:absolute; right: 10px;"> terminer </button>




    <div id="idg1" class="modal">
        <form class="modal-content animate" style="width: 50%;" method="post" action="../config/finish_command.php">
            <div class="imgcontainer">
                <span onclick="document.getElementById('idg1').style.display='none'" class="close" title="Close Modal">&times;</span>
                <div id="cont">
                    <div id="first">
                        <h5>veuillez selectionner le vendeur</h5>
                        <select name="user" id="" required>
                            <option value="" selected>selectionner le vendeur</option>
                            <?php
                            foreach ($list1 as $l1) {
                                $id = $l1['id'];
                                $nom = $l1['nom'];
                                echo "<option value='$id'> $nom";
                            }
                            ?>
                        </select>
                    </div>
                    <div id="second">
                        <h5>veuillez selectionner le client</h5>
                        <select name="client" id="" required>
                            <option value="" selected>selectionner le client</option>
                            <?php
                            foreach ($list2 as $l2) {
                                $id = $l2['id'];
                                $nom = $l2['nom'];
                                echo "<option value='$id'> $nom";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                Montant : <input type="number" name="montant" placeholder="le montant donne">
                <input class="cart" id="<?php echo $r['id'] ?>" type="submit" value="terminer">
            </div>
        </form>
    </div>
    <style>
        #cont {
             width: 100%; 
            overflow: hidden;
            /* will contain if #first is longer than #second */
            margin-bottom: 20px;
        }

        #first {
            width: 50%; 
            float: left;
            /* add this */
            border-right: 1px solid black;
        }

        #second {
            width: 50%; 
            
            overflow: hidden;
            /* if you don't want #second to wrap below #first */
        }
    </style>
    <script>
        var modalg1 = document.getElementById('idg1');

        window.onclick = function(event) {

            if (event.target == modalg1) {
                modalg1.style.display = "none";
            }

        }
    </script>
</body>