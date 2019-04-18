 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    

    <title>Liens</title>
</head>
<body>
<div class="container text-center">
    <hr>
    <hr>
    <h1 class="display-4 text-center alert alert-info">Liens Pays !!</h1>
    <hr>


    <h2 class=" allert alert-danger" >Votre langue : </h2>
    <ul class="list-group">
    <li class="list-group-item"> <a href="?pays=fr" class="list-group alert alert-info">France</a> </li>
    <li class="list-group-item"> <a href="?pays=es" class="list-group alert alert-danger">Espagne</a> </li>
    <li class="list-group-item"> <a href="?pays=an" class="list-group alert alert-info">Angletterre</a> </li>
    <li class="list-group-item"> <a href="?pays=it" class="list-group alert alert-danger">Italie</a> </li></ul>
</div>

   <?php
    if(isset($_GET['pays']))// on entre dans la condition dans le cas ou je clique sur un lien 'pays'
    {
        $pays= $_GET['pays'];
    }
    elseif(isset($_COOKIE['pays'])) // on entre dans la condition dans le cas ou on quitte et reviens sur le site 
    {
         $pays= $_COOKIE['pays'];
    }
    else //données de base client !
    {
        $pays='fr';
    }

    //-------------------------------------------------------------------------------------------------------------------
        //Un cookie est un fichier conservé côté client , il contient des donées non sensibles .
    
    switch($pays)   
    {
        case 'fr';
        echo "<div class='text text-center text-info'> Vous êtes sur une site Français<br>";
    break;
        case 'es';
        echo "<div class='text text-center text-danger'> Estas en un sitio español<br>' ";
    break;
        case 'an';
        echo " <div class='text text-center text-info'> You are on an English web-site<br>";
    break;
        case 'it';
        echo  "<div class='text text-center text-danger'> Sei su un sito italiano<br></div>";
    break;
    }
    ?>
    <hr>

</body>
</html>