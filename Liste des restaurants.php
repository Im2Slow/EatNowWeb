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
    <link rel="stylesheet" href="Liste des restaurants.css" />
	<link href="https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet">
    <title>Liste des restaurants</title>
</head>

<body background="img/background1.jpg">
<!--Modifier l'action du form pour qu'il redirige vers Commande.php quand le script sera fonctionnel-->
<form method="post" action="index1.php"><br align ="center">
Veuillez choisir le restaurant chez lequel vous voulez commander : <br>
	<?php 
	// 5 - la requête liste des restos
    $index = mysql_query('SELECT Name AS nom, Location AS addresse, Type AS type, Description AS description FROM restaurants');	

// 6-  l'affichage des restos
	while($result = mysql_fetch_array($index)){
echo            '<input type="radio" name="restaurant" value="'.$result['nom'].'" id="'.$result['nom'].'" /> <label for="restaurant">'.$result['nom'].'</label><br><br>';
	}
	?>
	</form>
	</body>
</html>