<?php
//fonction de connexion à la bd
function connexion_bd(){
 
    $nom_du_serveur ="127.0.0.1:3388";
    $nom_de_la_base ="pix2";
    $nom_utilisateur ="root";
    $passe ="";
 
    $link = mysql_connect ($nom_du_serveur,$nom_utilisateur,$passe) or die ('Erreur : '.mysql_error());
    mysql_select_db($nom_de_la_base, $link) or die ('Erreur :'.mysql_error());
    if (!$link) {
        die('Connexion impossible : ' . mysql_error() . "<br/>");
    }
}
function close_bd()
{
    mysql_close();
}
//email du webmaster
$email_webmaster = 'juliette.desormonts@gmail.com';
?>