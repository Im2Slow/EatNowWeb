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
	<meta http-equiv="Content-Language" content="fr-FR"/>
    <link rel="stylesheet" href="Liste des restaurants.css" />
	<link href="https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet">
    <title>Liste des restaurants</title>
</head>

<body>
<a href="auth-user.php" class="retour">Retour</a>
<form method="post" action="Commande.php"><h1 align = "center">Liste des restaurants</h1>
<center><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2205.6939281873556!2d2.2350263176174656!3d48.89582425977197!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66501d272b3c5%3A0xa3d422deeac71c6d!2s12+Avenue+L%C3%A9onard+de+Vinci%2C+92400+Courbevoie%2C+France!5e0!3m2!1sfr!2sfr!4v1493223707921" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe></center>
<br>Veuillez choisir le restaurant chez lequel vous voulez commander : <br><br>
	<?php 
	// 5 - la requête liste des restos
    $index = mysql_query('SELECT Number as number, Name AS nom, Location AS adresse, Type AS type, Description AS description FROM restaurants');	

// 6-  l'affichage des restos
	while($result = mysql_fetch_array($index)){
echo     '<a href="#">
<input type="radio" name="restaurant" value="'.$result['nom'].'" id="'.$result['Number'].'" />
<label for="'.$result['nom'].'">
<b>'.$result['nom'].'</b>
<span>
<i>Adresse</i> : '.$result['adresse'].'<br>
<i>Type</i> : '.$result['type'].'<br>
</span>
</label>
</a><br><br>';
	}?>
	<input type="submit" value="Suivant" />
	</form>
	</body>
</html>