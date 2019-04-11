<?php

// Connexion a noitre base de donnée !!!!
$bdd = new PDO('mysql:host=localhost;dbname=site', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES utf8' ));

// Session 
session_start();

// Chemin 
define("RACINE_SITE", $_SERVER['DOCUMENT_ROOT']. '/BACK/PHP/10_site/');
//$_SERVER['DOCUMENT_ROOT'] -->
//Lors de l'enregistrement d'image / photos, nous aurons besoins du chemin physique complet pour enregistrer la photo dans le bon dossier 

// echo RACINE_SITE;

define("URL", "http://localhost/BACK/PHP/10_site/");
// echo URL;
// Cette constante servira a enregistre l'url d'une photo/image dans la bdd, on conserve jamais la photo elle même, ce seraît trop lourd pour la base de donnée .

// Variables
$error = ''; // Créer un message d'erreur
$validate = ''; // Créer un message de validation
$content = ''; // Permet de placer du contenu où on souhaite 


// Failes XSS 
foreach($_POST as $key => $value)
{
    $_POST[$key]  = strip_tags(trim($value));
}  

// Get 
foreach($_GET as $key => $value)
{
        $_GET[$key] = strip_tags(trim($value));
}
// strip_tags()---->: supprime les balises Url
// trim()---->: supprime les espaces en début et fin de chaine 


//---- Inclusions
//Inclue fonction.php dans init.php, ca évitra de l'appeler sur chaque page 
require_once("fonction.php");

require_once("header.php");
require_once("footer.php");


?>