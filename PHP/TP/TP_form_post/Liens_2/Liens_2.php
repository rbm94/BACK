 <?php
    if(isset($_GET['sexe']))// on entre dans la condition dans le cas ou je clique sur un lien 'sexe'
    {
        $sexe = $_GET['sexe'];
    }
   
    else //données de base client !
    {
        $sexe= 'sexe';
    }

    //-------------------------------------------------------------------------------------------------------------------
        //Un cookie est un fichier conservé côté client , il contient des donées non sensibles .
    $validate = "";
    switch($sexe)   
    {
        case 'f';
        echo "<div class='text text-center text-info'> Vous êtes une femme<br>";
    break;
        case 'h';
        echo "<div class='text text-center text-danger'> Vous êtes un homme<br>";
    break;
    
    }
 
    ?>
    <hr>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    

</head>
<body>
    
<div class="container text-center">
    <hr>
    <hr>
    <h1 class="display-4 text-center alert alert-info">Liens sexe !!</h1>
    <hr>


    <h2 class=" allert alert-danger" >Votre sexe : </h2>
    <ul class="list-group">
    <li class="list-group-item"> <a href="?sexe=f" class="list-group alert alert-info">Femme</a> </li>
    <li class="list-group-item"> <a href="?sexe=h" class="list-group alert alert-danger">Homme</a> </li></ul>
</div>

  
</body>
</html>