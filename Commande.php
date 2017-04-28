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
    <title>Commande</title>
</head>

<body>
<a href="Liste des restaurants.php" class="retour">Retour</a>
<form method="post" action="panier.php"><center><h1>Contenu de la commande</h1></center>
<br>
<?php 
if ( isset($_POST['restaurant']) && !empty($_POST['restaurant']) ) {
	
	/// 5 - la requête liste des plats
    $index = mysql_query(	"SELECT dishes.`ID Restaurant` as idResto, dishes.Number as number, dishes.Name AS nom, Cost AS prix, dishes.Type AS type FROM dishes 
  inner join restaurants on  restaurants.Number = dishes.`ID Restaurant` 
  where restaurants.Name = '".$_POST['restaurant']."'" );
  
// 6-  l'affichage des plats
	while($result = mysql_fetch_array($index)){
		$_SESSION['idResto'] = $result['idResto'];
	//<input type="checkbox" name="plats[]" value="'.$result['nom'].'" id="'.$result['nom'].'" />

echo '<a href="#">
<input type="checkbox" name="plats[]" value="'.$result['number'].'" />
<label for="'.$result['nom'].'">
<b>'.$result['nom'].'</b>
<span>
<i>Prix</i> : '.$result['prix'].' &euro;<br>
<i>Type</i> : '.$result['type'].'<br>
</span>
</label>
</a><br><br>';	
} 
}
close_bd();
	?>
	<br>
	<input type="submit",name ="submit"," value="Suivant" />
	</form>
	</body>
	</html>