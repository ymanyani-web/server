<?php
session_start();
try {
    $pdo = new PDO('mysql:host=localhost;dbname=gestion;charset=utf8', 'root', 'root');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
if (isset($_POST['cb'], $_POST['quantity']) && is_numeric($_POST['cb']) && is_numeric($_POST['quantity'])) {
    $cb = (int)$_POST['cb'];
    $quantity = (int)$_POST['quantity'];
    $stmt = $pdo->prepare('SELECT * FROM products WHERE code_bare = ?');
    $stmt->execute([$_POST['cb']]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($product && $quantity > 0) {
        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
            if (array_key_exists($cb, $_SESSION['cart'])) {
                $_SESSION['cart'][$cb] += $quantity;
            } else {
                $_SESSION['cart'][$cb] = $quantity;
            }
        } else {
            $_SESSION['cart'] = array($cb => $quantity);
        }
    }
    echo "good";
    header('location: operation.php');
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
                $_SESSION['cart'][$id] = $quantity;
            }
        }
    }
    header('location: operation.php');
    exit;
}


$products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
$products = array();
$subtotal = 0.00;
// If there are products in cart
if ($products_in_cart) {
    $array_to_question_marks = implode(',', array_fill(0, count($products_in_cart), '?'));
    $stmt = $pdo->prepare('SELECT * FROM products WHERE code_bare IN (' . $array_to_question_marks . ')');
    $stmt->execute(array_keys($products_in_cart));
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($products as $product) {
        $subtotal += (float)$product['pu'] * (int)$products_in_cart[$product['code_bare']];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../assets/css/index.css">
    <link rel="stylesheet" href="../assets/css1/templatemo-ocean-vibes.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <title>????????????</title>
</head>

<body>
    <header>    
        <a href="../index.php"><h1>app logo</h1></a>
    </header>
    <div>
        <form action="#" method="POST">
            <input type="text" name="cb">
            <input type="number" min='1' value="1" name="quantity">
            <input type="submit">
        </form>
        <form action="#" method="post">
            <table style="width: 100%;">
                <thead>
                    <tr>
                        <td colspan="">Product</td>
                        <td>Price</td>
                        <td>Quantity</td>
                        <td>Total</td>
                        <td>remove</td>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($products)) : ?>
                        <tr>
                            <td colspan="5" style="text-align:center;">You have no products added in your Shopping Cart</td>
                        </tr>
                    <?php else : ?>
                        <?php foreach ($products as $product) : ?>
                            <tr>
                                <td>
                                    <a href="product-details.php?id=<?= $product['id'] ?>"><?= $product['designation'] ?></a>
                                </td>
                                <td class="price">&dollar;<?= $product['pu'] ?></td>
                                <td class="quantity">
                                    <input type="number" name="quantity-<?= $product['code_bare'] ?>" value="<?= $products_in_cart[$product['code_bare']] ?>" min="1" max="<?= $product['quantite'] ?>" placeholder="Quantity" required>
                                </td>
                                <td class="price">&dollar;<?= $product['pu'] * $products_in_cart[$product['code_bare']] ?></td>
                                <td>
                                    <a href="operation.php?remove=<?= $product['code_bare'] ?>" class="remove">Remove</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
            <div class="subtotal">
                <span class="text">Subtotal</span>
                <span class="price">&dollar;<?= $subtotal ?></span>
            </div>
            <div class="buttons">
                <input type="submit" value="Update" name="update">
                <input type="submit" value="Place Order" name="placeorder">
            </div>
        </form>
    </div>