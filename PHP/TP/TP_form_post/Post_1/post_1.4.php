
<?php 
 $error =""; // Création d'une variable pour qu'elle puisse être utilisable
 if($_POST){ #Ne s'affiche que si une valeur est entrée  
                 echo '<div class="col-md-3 offset-md-5 alert alert-dark text-dark mx-auto text-center">';
                 foreach($_POST as $key2 => $value)
                     {
                     echo "$key2 => $value<br>";
                     }
                 echo'</div>';
            

                if(iconv_strlen($_POST['nom']) < 3 || iconv_strlen($_POST['nom']) > 10){
        
                $error .='<div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark"> Le nom doit contenir entre 3 et 10 caractères !! </div>';
            }


//             if($_POST)
//                     {
//                         echo "Email : $_POST[email]<br>";
//                         echo "Mot de passe  : " . $_POST['mdp'] . "<br>";
//                     }
//                         echo '<hr>';
}
echo $error;           
// ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Post_1.4</title>

   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">



</head>
<body>





<!-- PARTIE PHP -->

 <form class="col-md-6 mx-auto container" method="post" action="">
    <div class="form-group mx-auto col-md-6">
        <label for="inputNom">Nom</label>
        <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom">
        </div><!-- Nom -->

        <div class="form-group mx-auto col-md-6">
            <label for="email">Email address</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Enter email"><!-- il ne faut surtout pas oublier les attributs name sur le formualire html, sinon aucune donnée saisie ne sera récupérée en PHP -->
        </div><!-- Nom -->

        <div class="form-group mx-auto col-md-6 offset-md-12 ">
            <label for="mdp">Password</label>
            <input type="passWord" class="form-control" id="mdp" name="mdp" placeholder="Password">
        </div><!-- Mot de passe  -->

        <button type="submit" class="form-group mx-auto col-md-6 offset-md-12  btn btn-dark">Submit</button>
</form>
</body>
</html>