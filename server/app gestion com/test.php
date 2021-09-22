<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=gestion;charset=utf8', 'root', 'root');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
$reponse4 = $bdd->query("SELECT * FROM fournisseur");

/* $aDoor = $_POST['fournisseurId'];
if(empty($aDoor)) 
{
  echo("You didn't select any buildings.");
} 
else 
{
  $N = count($aDoor);

  for($i=0; $i < $N; $i++)
  {
    echo($aDoor[$i] . " ");
  }
} */
  
$fournisseurId = isset($_POST['fournisseurId']) ? $_POST['fournisseurId'] : array();
$pu_fournisseur = isset($_POST['pu_fournisseur']) ? $_POST['pu_fournisseur'] : array();

print_r($fournisseurId);
print_r($pu_fournisseur);

 foreach ($fournisseurId as $index => $aa) {
    echo $aa;
    echo "==";
    echo $pu_fournisseur[$aa -1];
} 
?>
<form action="" method="post">
    <?php
foreach ($reponse4 as $r4) :
    $nom = $r4['nom'];
    $id = $r4['id'];
    echo "<input type='checkbox' id='$id' value='$id' name='fournisseurId[]'> 
        <label for='$id'>$nom</label> 
<input type='number' name='pu_fournisseur[]' id='pu_fournisseur'>
<label for='pu_fournisseur'>prix unitaire fournisseur</label> <br>";
endforeach;
echo "<br>";
?>
    <input type="submit">
</form>