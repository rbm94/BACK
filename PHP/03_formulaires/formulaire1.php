<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <h1 class="display-4 text-center">Formulaire 1</h1>

<?php
echo '<pre>' ; print_r($_POST); echo '</pre>'; # Véhicules les données saisi d'un formulaire !!
        if($_POST){ #Ne s'affiche que si une valeur est entrée  
             echo '<div class="col-md-3 offset-md-5 alert alert-dark text-dark mx-auto text-center">';
            foreach($_POST as $key2 => $value)
            {
                echo "$key2 => $value<br>";
            }
            echo'</div>';


        }
//Extraction de valeurs en passant par la super global "$_POST" et les "[]"

//Sans "if" les indices 'email' et 'password' ne sont pas reconnus donc une erreur aparait a l'écran


if($_POST){

    echo $_POST['email'] . '<hr>';
    echo $_POST['password'] . '<hr>';
}
         
         
?>

</head>
<body>
    <!-- Exo 1  Faire un formulaire avec -->
<form class="col-md-4 offset-md-4" method="post" action=""> <!-- method: comment vont circuler les infos / action: urlde destination  -->
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button class="col-md-4 offset-md-4 btn btn-primary" type="submit">Submit</button>
</form>

</body>
</html>