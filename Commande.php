<?php if ( isset($_POST['restaurant']) && !empty($_POST['restaurant']) ) {?>
<form method="post" action="index1.php"><br align ="center">
Veuillez choisir le restaurant chez lequel vous voulez commander : <br>
	<?php 
	/// 5 - la requête liste des restos
    $index = mysql_query('SELECT Name AS nom, Cost AS prix, FROM dishes');	

// 6-  l'affichage des restos
	while($result = mysql_fetch_array($index)){
echo            '<input type="radio" name="plat" value="'.$result['nom'].'" id="'.$result['nom'].'" /> <label for="plat">'.$result['nom'].'</label><br><br>';
	}
	?>
	</form>
	<?php } ?>