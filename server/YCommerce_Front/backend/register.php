<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=commerce;charset=utf8', 'root', 'root');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

if ($_POST['fname'] && $_POST['address'] && $_POST['phone']  && $_POST['email'] && $_POST['pass']) {
    if ($_POST['pass'] == $_POST['cpass']) {
        $user = htmlspecialchars(trim($_POST['fname']));
        $address = htmlspecialchars(trim($_POST['address']));
        $phone = htmlspecialchars(trim($_POST['phone']));
        $email = htmlspecialchars(trim($_POST['email']));
        $pass = htmlspecialchars(sha1($_POST['pass']));

        $db = mysqli_connect('localhost', 'root', 'root', 'commerce');
        $sql_u = "SELECT * FROM users WHERE email='$email'";
        $res_u = mysqli_query($db, $sql_u);
        if (mysqli_num_rows($res_u) > 0) {
            echo "<script>alert('email already exist');</script>";
            echo "<script> window.history.back();</script>";
        } else {
            $req = $bdd->prepare('INSERT INTO users(`name`,`address`,phone_number, email, `password`) VALUES(:username,:addrs, :phone, :email, :passwd)');
            $req->execute(array(
                'username' => $user,
                'addrs' => $address,
                'phone' => $phone,
                'email' => $email,
                'passwd' => $pass,
            ));

            header('Location: ../login.html');
        }
    } else {
        echo "<script>alert('passwords non identique');</script>";
        echo "<script> window.history.back();</script>";
    }
}
