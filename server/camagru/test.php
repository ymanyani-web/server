<?php
$db = mysqli_connect('localhost', 'server', 'server123', 'camagru');
if($db)
{
        echo "OK";
}
else{
    echo "KO";
}

?>