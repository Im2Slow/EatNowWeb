<?php
session_start();
//destruction de la session
if(isset($_GET['dec']) && $_GET['dec']=="close"){
unset($_SESSION['pseudo']);
unset($_SESSION['pass']);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; UTF-8" />
<meta http-equiv="Content-Language" content="fr" />
<title>Authentification</title>
<link rel="stylesheet" href="auth-style-index.css" type="text/css" media="screen" />
<link href="https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet">
</head>

<body background="img/french_fries_and_chips.jpg">
<div id="centre">
<h1>Authentification</h1>
<form method="POST" action="index1.php">
<label for="pseudo">Pseudo : </label><input type="text" name="pseudo" maxlength="20" value="<?php if (!empty($_POST["pseudo"])) { echo stripcslashes(htmlspecialchars($_POST["pseudo"],ENT_QUOTES)); } ?>" /><br/>
<label for="pass">Mot de Passe : </label><input type="password" name="motdepass" maxlength="20" value="<?php if (!empty($_POST["motdepass"])) { echo stripcslashes(htmlspecialchars($_POST["motdepass"],ENT_QUOTES)); } ?>" /><br/>
<label for="action">Action : </label><input type="submit" name="Valider" value="Valider" />
<input name="Réinitialiser" value="R&eacute;initialiser" type="reset" />
</form>
<br/>
<p id="lien"><a href="index1.php">Connexion</a> | <a href="auth-creer-compte.php">Cr&eacute;er un compte</a> | <a href="auth-identifiant-perdu.php">Identifiant perdu?</a></p>
</div>

<noscript><div id="erreur"><b>Votre navigateur ne prend pas en charge JavaScript!</b> Veuillez activer JavaScript afin de profiter pleinement du site.</div></noscript>

</body>
</html>
<?php
if(isset($_POST['Valider'])){
//si pseudo vide
if(empty($_POST['pseudo'])){
echo '<div id="erreur">Veuillez saisir un pseudo!</div>';
}
//si mot de passe vide
else if(empty($_POST['motdepass'])){
echo '<div id="erreur">Veuillez saisir un mot de passe!</div>';
}
//c'est ok
else{
include("auth-data_bd.php");
connexion_bd();
//On selectionne les données
$index = mysql_query("SELECT id,pseudo,pass,valide FROM LOGIN WHERE pseudo='".mysql_real_escape_string(stripcslashes(utf8_decode($_POST['pseudo'])))."' AND pass='".mysql_real_escape_string(utf8_decode($_POST['motdepass']))."'");
//si pas de résultat
if(mysql_num_rows($index) == 0)
{
echo '<div id="erreur">Aucunes données ne correspond à votre saisie!</div>';
}
else{
while($result = mysql_fetch_array($index)){
//si le compte n'a pas été validé
if($result['valide']==0){
echo '<div id="erreur">Vous n\'avez pas validé votre inscription!<br/>» <a href="auth-valider-inscription.php?id='.$result['id'].'">Valider votre inscription</a></div>';
}
//si le compte a été black-listé
elseif($result['valide']==2){
echo '<div id="erreur">Votre compte a été black listé!</div>';
}
//si résultat
else{
//on créé la session
$_SESSION['pseudo'] = utf8_decode($_POST['pseudo']);
$_SESSION['pass'] = utf8_decode($_POST['motdepass']);
//on redirige
//echo '<div id="ok">Connexion réussie. Redirection en cours...</div> <script type="text/javascript"> window.setTimeout("location=(\'auth-user.php\');",3000) </script>';
echo '<meta http-equiv="refresh" content="0;URL=auth-user.php">';
}
}
}
close_bd();
}
}
?>