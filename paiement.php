<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<?php 
//ouverture de session
session_start();
//on vérifie si les 2 sessions sont présentes
if(isset($_SESSION['pseudo']) && isset($_SESSION['pass'])){
    include("auth-data_bd.php");
    connexion_bd();
}
	?>
<html>
<head>
    <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
    <link rel="stylesheet" href="Commande.css" />
	<link href="https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet">
    <title>Paiement</title>
</head>

<body>
<a href="panier.php" class="retour">Retour</a>
<form method="post" action="auth-user.php"><center><h1>Paiement</h1></center>
<br>
<?php

 if(isset($_SESSION['plats'])&& !empty($_SESSION['plats'])){
   foreach ($_SESSION['plats'] as $plat) {
		$index = mysql_query('INSERT INTO orders (`ID Login`, `ID Restaurant`, `ID Menu`, Payed ) VALUES('.$_SESSION['id'].' ,'.$_SESSION['idResto'].' ,'.$plat.',0)');
}
close_bd();
 }
	?>
	<input type="submit",name = "test",value="Confirmer le paiement" />
	</form>
	</body>
	</html>