<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=gestion;charset=utf8', 'root', 'root');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
if (!empty($_POST['n']))
    $n = $_POST['n'];
elseif (!empty($_GET['n']))
    $n = $_GET['n'];
else {
    echo "error: veuillez nous contacter";
    exit;
}

$list1 = $pdo->query("SELECT * FROM operation WHERE numero_facture=$n");
$list2 = $pdo->query("SELECT * FROM operation WHERE numero_facture=$n LIMIT 1");

foreach ($list2 as $l2) {
    $id_seller = $l2['sellerId'];
    $id_client = $l2['clientId'];
    $date = $l2['date'];
}
$seller = $pdo->query("SELECT * FROM users WHERE id=$id_seller");
$client = $pdo->query("SELECT * FROM client WHERE id=$id_client");

foreach ($seller as $s)
    $seller_ = $s['nom'];

foreach ($client as $c) {
    $client_n = $c['nom'];
    $client_a = $c['adresse'];
    $client_nm = $c['numero'];
}

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
        Facture Nº:<?= $_POST['n'] ?> <?= $_GET['n'] ?> <br>
        DATE: <?= $date; ?>
        <div id="info">
            <div class="info1">
                Nom du vendeur: <?php echo $seller_ ?> <br> <br>
                Numero de telephone: +212 6-------- <br> <br>
                Adresse: Setat ==================
            </div>
            <div class="info1">
                Nom du client: <?php echo $client_n ?> <br> <br>
                Adresse: <?php echo $client_a ?> <br> <br>
                Numero telephone: <?php echo $client_nm ?> <br>
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
                <?php foreach ($list1 as $product) : ?>
                    <tr>
                        <td class="quantity">
                            <?= $product['quantite'] ?>
                        </td>
                        <td>
                            <?php
                            $idd = $product['idProduit'];
                            $pr1 = $pdo->query("SELECT * FROM products WHERE id=$idd LIMIT 1");
                            foreach ($pr1 as $p1) :
                                echo $p1['designation'];

                            ?>
                        </td>
                        <td class="price">
                            <?php
                                echo $p1['pu'];
                            ?> Dh
                        </td>
                    <?php endforeach; ?>

                    <td class="price">
                        <?= $product['montant'] ?> Dh
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