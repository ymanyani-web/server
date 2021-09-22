<?php
$nn = $_FILES['profile']['tmp_name'];
echo $nn;
    //move_uploaded_file($_FILES['profile']['tmp_name'], "../images/$cb-$nn");
    $path =  "images/$cb-$nn";