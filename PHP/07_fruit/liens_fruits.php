<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    

    <title>Cookie PHP</title>
</head>
<body>
<div class="container text-center">
    <h1 class="display-4 text-center alert alert-info">Liens Fruits</h1>
    <hr>
    <?php


//EXo : créer 4liens HTML sur la même page avec le nom des fruits 
//-2.Envoyer cerises dans l'url  SI on clic sur le lien cerises
//-3.Afficher 'cerises' sur la page 
//-4.Envoyer l'information à la fonction 'calcul()' afin d'afficher le prix au kg 


        $fruits = 'fruits';
    if(isset($_GET['fruits']))// on entre dans la condition dans le cas ou je clique sur un lien 'pays'
    {
        $fruits= $_GET['fruits'];
    }
    elseif(isset($_COOKIE['fruits'])) // on entre dans la condition dans le cas ou on quitte et reviens sur le site 
    {
         $fruits= $_COOKIE['fruits'];
    }
    
    //-------------------------------------------------------------------------------------------------------------------
    //Création d'un Fichier COOKIE 

    // $un_an = 365*24*3600; //correspond a une année en seconde § durée de vie du cookie 

    setcookie("fruit", $fruits); //Permet de créer un cookie coté client.
    //3eme argument: le nom du cookie / valeur du cookie / durée de vie 

    // echo '<pre>'; print_r($_COOKIE); echo '</pre>';


        //Un cookie est un fichier conservé côté client , il contient des donées non sensibles .


    // switch($fruits)   
    // {
    //     case 'cerises';
    //     echo "Vous avez choisis $fruits<br>";
    // break;
    //     case 'bananes';
    //     echo "Vous avez choisis $fruits<br>' ";
    // break;
    //     case 'pommes';
    //     echo " Vous avez choisis $fruits<br>";
    // break;
    //     case 'pêches';
    //     echo " Vous avez choisis $fruits<br>";
    // break;
    // }

    ?>

    <h2 class=" allert alert-danger" >Votre fruit : <?= (isset($_GET['fruits'])) ? $_GET['fruits'] : "Aucun fruit séléctionné !"; ?> </h2>
<?php
require_once("fonction.php");
if(isset($_GET['fruits']))
{
    echo calcul($_GET['fruits'], 1000);
}

?>

    <ul class="list-group">
    <li class="list-group-item"> <a href="?fruits=bananes" class="list-group alert alert-warning">bananes</a> </li>
    <li class="list-group-item"> <a href="?fruits=cerises" class="list-group alert alert-danger">cerises</a> </li>
    <li class="list-group-item"> <a href="?fruits=pommes" class="list-group alert alert-success">pommes</a> </li>
    <li class="list-group-item"> <a href="?fruits=pêches" class="list-group alert alert-warning">pêches</a> </li></ul>
</div>
</body>
</html>