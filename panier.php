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
    <title>Panier</title>
</head>

<body>
<a href="Commande.php" class="retour">Retour</a>
<form method="post" action="paiement.php"><center><h1>Contenu du panier</h1></center>
<?php
 if(isset($_POST['plats'])&& !empty($_POST['plats'])){
	$_SESSION['plats'] = $_POST['plats'];
	 $PrixTotal = 0;
   foreach ($_POST['plats'] as $plat) {
		$index = mysql_query("SELECT dishes.Name as nom, dishes.Cost as prix, dishes.Type as type FROM dishes WHERE ".$plat." = dishes.Number");
		$result = mysql_fetch_array($index);
             echo '<br>- '.$result['nom'].'
 : '.$result['prix'].' euro<br>';

			 $PrixTotal += $result['prix'];
        }
		
		echo ' <br/> <b>Prix Total : '.$PrixTotal.' euros </b>';
}
close_bd();
	?>
	<br><br><input type="submit",name = "test",value="Confirmer" />
	</form>
	</body>
	</html>