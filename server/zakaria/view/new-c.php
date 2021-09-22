<?php
session_start();
if(empty($_SESSION['user']))
{
	header('Location: ../index.php?msg=2');
}
?>
<!DOCTYPE html>
<html>
<head>
<script>
    if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
		<meta charset="utf-8">
		<title>Lapsus - Website Landing Page</title>
		<!-- Description, Keywords and Author -->
		<meta name="description" content="Your description">
		<meta name="keywords" content="Your,Keywords">
		<meta name="author" content="ResponsiveWebInc">
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- Styles -->
		<!-- Bootstrap CSS -->
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<!-- Font awesome CSS -->
		<link href="../css/font-awesome.min.css" rel="stylesheet">		
		<!-- Custom CSS -->
		<link href="../css/style.css" rel="stylesheet">
		<link href="../css/my.css" rel="stylesheet">
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="#">
		<style>
html {
    height: auto;
    min-height: 100%;
}
body {
  margin:0;
  padding:0;
  font-family: sans-serif;
color: black;
  background: linear-gradient(#0000, #FF8B00);
}
input[type=submit] {
    background-color: #FF8B00;
    border: none;
    color: white;
    padding: 14px 32px;
    text-decoration: none;
    margin: 4px 2px;
	cursor: pointer;
	border-radius: 8px;
	
  }
</style>

<body>
<div class="wrapper">
			<!-- banner -->
					<div class="banner-content">
						<!-- logo image -->
						<a href="index.php"><img class="img-responsive" src="../img/logo.png" alt="" /></a>
					</div>
					<div class="langue">
						<a href="../view/new-c.php?lg=1">عربي | </a>
						<a href="../view/new-c.php">Français</a>
					</div>
			</div>


<div class="login-box">
	<?php
	if($_GET['lg']==1)
		echo "<h2>أدخل المعلومات اللازمة لإضافة عميل جديد</h2>";
	else
		echo "<h2>Entrer les information necessaire pour ajouter un nouveau client</h2>";
	?>

<form action="../controller/add.php" method="post" autocomplete="off">
	<div class="user-box">
		<input type="text" name="nom" required>
		<?php
		if($_GET['lg']==1)
			echo "<label>الاسم الاول</label>";
		else
			echo "<label>Nom</label>";
		?>
	</div>

	<div class="user-box">
	    <input type="text" name="prenom"required>
		<label></label>
		<?php
		if($_GET['lg']==1)
			echo "<label>الاسم الاول</label>";
		else
			echo "<label>Prenom</label>";
		?>
	</div>

	<div class="user-box">
    	<input type="text" name="cin">
		<label>C.I.N</label>
	</div>

  <div class="user-box">
    	<input type="number" name="rib" oninput="maxLengthCheck(this)" maxlength = "24" minlength="24">
		<label>RIB</label>
	</div>

    <input type="submit" value="ajouter">
</form>
<?php
echo $msg;
?>

</body>

<script>
  // This is an old version, for a more recent version look at
  // https://jsfiddle.net/DRSDavidSoft/zb4ft1qq/2/
  function maxLengthCheck(object)
  {
    if (object.value.length > object.maxLength)
      object.value = object.value.slice(0, object.maxLength)
  }
</script>