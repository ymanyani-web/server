<?php
    include     'connect_db.php';
    $db = mysqli_connect('localhost', 'root', 'root', 'printech');

$cb = $_POST['c_b'];
$qq = $_POST['quantite'];
$reponse = $bdd->query("SELECT * FROM prdcts_vendu WHERE code_bare='$cb' AND quantite >= '$qq'  ORDER BY `id` DESC LIMIT 1");
$donnees = $reponse->fetch();
$order = $donnees['no_order'];
$id = $donnees['id'];

        //echo "OK";
        echo $donnee['quantite'] . "<br>";

        if($donnees['quantite'] == $_POST['quantite'])
        {
            $sql_uu = "DELETE FROM prdcts_vendu WHERE id = $id";
  	        mysqli_query($db, $sql_uu);

        }
        else
        {
            //diminuer la qantite from pdcts vendu and add it produits
            //echo "OK";
            $req1 = $bdd->prepare('UPDATE prdcts_vendu SET `quantite` = `quantite` - :q WHERE id = :ii');
            $req1->execute(array(
                'q' => $_POST['quantite'],
                'ii' => $donnees['id']
                ));
        }
        $sql_u = "SELECT * FROM products WHERE code_bare='$cb' AND id_order = '$order'";
        $res_u = mysqli_query($db, $sql_u);


        if (mysqli_num_rows($res_u) > 0)
        {
            echo "ok";
            $req2 = $bdd->prepare('UPDATE products SET `quantite_actuelle` = `quantite_actuelle` + :q WHERE code_bare= :cb AND id_order = :order');
            $req2->execute(array(
                'q' => $_POST['quantite'],
                'cb' => $cb,
                'order' => $order
                ));   
        }
        if (mysqli_num_rows($res_u) == 0)
        {
            ?>
        <script>
            alert("Not in the stock, u need to add it from /new order/");
            window.history.back();
        </script>
            <?php
        }