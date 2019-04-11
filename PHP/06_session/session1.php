<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <title>Session PHP n°1</title>
</head>
<body>
    
<div class="container text-center">
    <h1 class="display-4 text-center alert alert-success border border-success">Session PHO n°1</h1><hr>

<?php
//Une session permet de garder des variables accessiblies quelque soit la page où l'on se trouve 
//Exemple : sans session active aucun moyen de navigé sur internet en étant connecté.
//Les données sensibles sont stockées côté serveur !

    session_start(); //permet de créer un fichier session se trouvant dans c:/xampp/tmp

//Stockage d'indince dans un tanleau ARRAY
    $_SESSION['pseudo'] = 'LeB2S';
    $_SESSION['prenom'] = 'Bahaeddine';
    $_SESSION['nom'] = 'Rabhi';
    

    echo '<pre>'; print_r($_SESSION); echo '</pre>';

//vider une partie de la Session

    // unset($_SESSION['nom']);
        // echo '<pre>'; print_r($_SESSION); echo '</pre>';
//supprimer la Session
// session_destroy();

    ?>


</div>
</body>
</html>