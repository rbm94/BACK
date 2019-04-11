<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    
    <title>Fiche produit</title>

</head>
<body>
    
    <div class="container text-center">
     <h1 class="display-4 text-center" > Détails du produit n° <strong class="text-danger"><?= $_GET['id']?></strong> </h1><hr>

    <?php
        // echo '<pre>' ; print_r($_GET); echo '</pre>';
    //Les informations envoyées dans l'URL sont automatiquement stockées dans la superG $_GET , renvoyant un tableau ARRAY 

    //Exo : Afficher les données transmit dans l'URL avec un affichage user en exluant l'indice 'id' 
    echo '<div class="col-md-4 offset-md-4 mx-auto text-center alert alert-danger">';
    foreach($_GET as $key => $value)
    {
        if($key != 'id')// Si l'indice est à exclure 
        { 

            echo "<strong>$key</strong> : $value<br>";
        }
    }
    echo '</div>';
  
    

    ?>
    <a href="boutique.php">Retour a la boutique</a>

    </div>
</body>
</html>
