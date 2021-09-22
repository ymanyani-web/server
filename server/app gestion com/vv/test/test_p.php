<?php

$marque_vehiculeId = isset($_POST['marque_vehiculeId']) ? $_POST['marque_vehiculeId'] : [];

foreach($marque_vehiculeId as $d){
    echo $d;
    echo "<br>";
}