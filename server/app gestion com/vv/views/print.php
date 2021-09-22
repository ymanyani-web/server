<?php
session_start();
try {
    $pdo = new PDO('mysql:host=localhost;dbname=gestion;charset=utf8', 'root', 'root');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
date_default_timezone_set('UTC');
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
$seller = $_SESSION['seller'];
$list1 = $pdo->query("SELECT * FROM users WHERE id=$seller");
foreach ($list1 as $l1)
    $seller_ = $l1;
$client = $_SESSION['client'];
$list2 = $pdo->query("SELECT * FROM client WHERE id=$client");
foreach ($list2 as $l2)
    $client_ = $l2;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
    <script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
</head>

<body>
    <div id="all">
        <header>
            <div id="second_header">
                <div class="sous_header1"><br><br><span style="font-size:40px">Facture</span></div>
                <div class="sous_header2"><br><br><span style="font-size:20px">Union pieces agricoles</span></div>
            </div>
        </header> <br>
        Facture Nº:<?= $_SESSION['facture'] ?> <br>
        DATE: <?= date("j / n / Y"); ?>
        <div id="info">
            <div class="info1">
                Nom du vendeur: <?php echo $seller_['nom'] ?> <br> <br>
                Numero de telephone: +212 6-------- <br> <br>
                Adresse: Setat ==================
            </div>
            <div class="info1">
                Nom du client: <?php echo $client_['nom'] ?> <br> <br>
                Adresse: <?php echo $client_['adresse'] ?> <br> <br>
                Numero telephone: <?php echo $client_['numero'] ?> <br>
            </div>
        </div>
        <div id="table">
            <table id="testt">
                <tr>
                    <th>Quantite</td>
                    <th>Designation</td>
                    <th>prix unitaire HT</td>
                    <th>Total HT</td>
                </tr>
                <?php foreach ($products as $product) : ?>
                    <tr>
                        <td class="quantity">
                            <?= $products_in_cart[$product['id']][0] ?>
                        </td>
                        <td>
                            <?= $product['designation'] ?>
                        </td>
                        <td class="price">
                            <?= $product['pu'] ?> Dh
                        </td>

                        <td class="price">
                            <?= ($product['pu'] * $products_in_cart[$product['id']][0]) - ($product['pu'] * $products_in_cart[$product['id']][0] * $products_in_cart[$product['id']][1] * 0.01) ?> Dh
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <br>
        <div id="tb2">
            <table id="table2">
                <tr>
                    <td> TOTAL HT </th>
                    <td><?= $subtotal ?></th>
                </tr>
                <tr>
                    <td>Montant de TVA</td>
                    <td>20%</td>
                </tr>
                <tr>
                    <td>TOTAL TTC</td>
                    <td><?php echo $subtotal + ($subtotal * 0.2) ?></td>
                </tr>
            </table>
        </div>
        <div id="signature">
            Nom et signature :
        </div>
        <footer style="text-align: center">

        </footer>
    </div>
    <script>
            var HTML_Width = $("#all").width();
            var HTML_Height = $("#all").height();
            var top_left_margin = 15;
            var PDF_Width = HTML_Width + (top_left_margin * 2);
            var PDF_Height = (PDF_Width * 1.5) + (top_left_margin * 2);
            var canvas_image_width = HTML_Width;
            var canvas_image_height = HTML_Height;

            var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;

            html2canvas($("#all")[0]).then(function(canvas) {
                var imgData = canvas.toDataURL("image/jpeg", 1.0);
                var pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);
                pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin, canvas_image_width, canvas_image_height);
                for (var i = 1; i <= totalPDFPages; i++) {
                    pdf.addPage(PDF_Width, PDF_Height);
                    pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height * i) + (top_left_margin * 4), canvas_image_width, canvas_image_height);
                }
                pdf.save("Your_PDF_Name.pdf");
                $("#all").hide();
            });
    </script>
</body>

</html>



<style>
    body {
        font-size: 20px;
    }

    header {
        width: 100%;
        height: 250px;
        display: flex;
        /* establish flex container */
        flex-direction: row;
        /* default value; can be omitted */
        flex-wrap: nowrap;
    }

    #first_header {
        width: 500px;
        border: 3px solid black;
        display: block;
        padding-top: 3%;
    }

    #second_header {
        width: 100%;
        border: 3px solid black;
        display: block;
    }

    .sous_header1 {
        text-align: center;
        vertical-align: middle;
        width: 100%;
        height: 60%;
        border-bottom: 3px solid black;
        border-top: 0, 5px solid black;
    }

    .sous_header2 {
        text-align: center;
        width: 100%;
        height: 40%;
        border-bottom: 1px solid black;
        border-top: 0, 5px solid black;
    }




    /* informations */

    #info {
        margin-top: 30px;
        width: 100%;
        height: 200px;
        display: flex;
        /* establish flex container */
        flex-direction: row;
        /* default value; can be omitted */
        flex-wrap: nowrap;
        border: 3px solid black;
    }

    .info1 {
        padding: 20px 20px;
        width: 50%;
        display: block;
        font-size: 20px;
    }

    #nature {
        margin-top: 30px;
        width: 100%;
        height: 50px;
        border: 2px solid black;
        text-align: center;
    }

    #nature1 {
        width: 100%;
        height: 600px;
        display: flex;
        /* establish flex container */
        flex-direction: row;
        /* default value; can be omitted */
        flex-wrap: nowrap;
    }

    #nature1_1 {
        width: 600px;
        border: 2px solid black;
        padding: 10px;
    }

    #nature1_2 {
        width: 70%;
        border: 2px solid black;
        display: block;

    }

    #nature_1_2_1 {

        font-size: 20px;
        padding: 10px;
        width: 100%;
        height: 70%;
        border-bottom: 2px solid black;
        border-top: 0, 5px solid black;
    }

    #nature_1_2_2 {
        width: 100%;
        height: 30%;
        border-bottom: 2px solid black;
        border-top: 0, 5px solid black;
    }

    #table {
        margin-top: 20px;
    }

    #testt {
        border-collapse: collapse;
        width: 100%;
    }

    #testt td,
    #testt th {
        border: 2px solid black;
        padding: 8px;
        width: 25%;
    }


    #testt th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: center;
    }

    #tb2 {
        width: 100%;
        overflow: hidden;
    }

    #table2 {
        width: 30%;
        border-collapse: collapse;
        float: right;
    }

    #table2 td {
        border: 2px solid black;
        padding: 8px;
        width: 25%;
    }

    #table2 th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: center;
    }

    #sous_commentaire {
        width: 100%;
        height: 150px;
        border: 2px solid black;
    }

    #signature {
        padding-top: 20px;
        width: 100%;
        height: 100px;
        border-bottom: 2px solid black;
    }

    .autres {
        border: none;
        border-color: transparent;
        font-size: 20px;
    }
</style>