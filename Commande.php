<html>
<head>
    <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
    <link rel="stylesheet" href="Commande.css" />
	<link href="https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet">
    <title>Commande</title>
</head>

<body>
<a href="Liste des restaurants.php" class="retour">Retour</a>
<form method="post" action="index1.php"><center><h1>Contenu de la commande</h1></center>
<br>
<?php if ( isset($_POST['restaurant']) && !empty($_POST['restaurant']) ) {
	/// 5 - la requête liste des plats
    $index = mysql_query('SELECT Name AS nom, Cost AS prix, FROM dishes');	

// 6-  l'affichage des plats
	while($result = mysql_fetch_array($index)){
echo            '<input type="radio" name="plat" value="'.$result['nom'].'" id="'.$result['nom'].'" /> <label for="plat">'.$result['nom'].'</label><br><br>';
	}
}
	?>
	<input type="submit" value="Suivant" />
	</form>
	</body>
	</html>