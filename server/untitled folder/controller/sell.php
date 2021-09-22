<?php

include     '../controller/connect_db.php';
echo $_POST['prix_a'];
$code = $_POST['c_b'];
$prix = $_POST['prix'];
$prix_a = $_POST['prix_a'];
$q = $_POST['quantite'];
$pin = sha1($_POST['pin']);



$db = mysqli_connect('localhost', 'root', 'root', 'printech');
    $sql_u = "SELECT * FROM products WHERE code_bare='$code'";
  	$res_u = mysqli_query($db, $sql_u);

    if (mysqli_num_rows($res_u) == 1)
    {
        $reponse = $bdd->query($sql_u);
        $donnees = $reponse->fetch();
        $oorder = $donnees['id_order'];
        $nom = $donnees['nom'];
    }
    if (mysqli_num_rows($res_u) > 1)
    {
        echo "eee";
        $reponse = $bdd->query("SELECT * FROM products WHERE code_bare='$code' LIMIT 1");
        $donnees = $reponse->fetch();
        $nom = $donnees['nom'];
        $oorder = $donnees['id_order'];
    }
    $reponse1 = $bdd->query("SELECT * FROM users WHERE pin='$pin'");
    $donnees1 = $reponse1->fetch();
    $s = $donnees1['username']; 



 $req = $bdd->prepare('INSERT INTO prdcts_vendu(no_order, nom, code_bare, prix_vente, prix_achat, quantite, seller) VALUES(:order, :nom, :c_b, :prix, :prix_a, :q, :seller)');
$req->execute(array(
    'order' => $oorder,
    'nom' => $nom,
    'c_b' => $code,
    'prix' => $prix,
    'prix_a' => $prix_a,
    'q' => $q,
    'seller' => $s,
    )); 

$req1 = $bdd->prepare('UPDATE products SET `quantite_actuelle` = `quantite_actuelle` - :q WHERE code_bare = :c');
            $req1->execute(array(
                'q' => $q,
                'c' => $code
                ));



$reponse2 = $bdd->query("SELECT * FROM products WHERE code_bare='$code'");
$donnes2 = $reponse2->fetch();
/* if( $donnes2['']) */
$p1 = $donnes2['quantite_actuelle'];
$p2 = $donnes2['quantite'];

echo $code;
$prix_a;
echo $p1;



if ($p1 == '0')
{
    $sql_uu = "DELETE FROM Products WHERE code_bare = '$code' AND quantite_actuelle = '$p1'";
  	mysqli_query($db, $sql_uu);
}

if($p1 < $p2/5)
{
    ?>
<script>
    alert("More than 80% of this product has been selled");
    document.location.href = '../view/sell.php?';
</script>
    <?php

}

