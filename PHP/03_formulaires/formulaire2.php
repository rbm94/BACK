<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <title>Formulaire 2</title>

<?php
//1.Faire un formulaire HTML avec : pseudo, mdp, confirmation mdp, nom, prénom, email, téléphone, adresse, ville, code postal et un bouton submit 


//2.Vérifier les données en PHP:

// echo '<pre>' ; print_r($_POST); echo '</pre>';

//3.Informer le client si le pseudo et trop court '2 à 20 caractères'.
$error = '';
if($_POST){ 
if(iconv_strlen($_POST['pseudo']) < 2 || iconv_strlen($_POST['pseudo']) > 20){
    
    echo '<div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark">Le pseudo doit contenir entre 2 et 20 caractères !! </div>';
}
//4.Faite en sorte d'informer l'internaute si les mdp ne sont pas identiques :
if($_POST['passW'] !== $_POST['pw']){
    
    $error.= '<div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark">Les 2 mots de passe ne sont pas similaire !! </div>';
}
//5.Faite en sorte de dire au client que le format email n'est pas valide  
if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    $error.= '<div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark"> Email non valide !! </div>';
}
//6.Type numérique et Code P de 5 caractère Min&Max
if(iconv_strlen($_POST['cp']) !==5 || !is_numeric($_POST['cp']))
{
     $error.= '<div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark"> Code postale non valide !! </div>';
}
//7.Informer client si le champs nom est vide 
if(empty($_POST['nom']))
{
   $error.= '<div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark"> Merci de remplire le champs \'nom\' !! </div>'; 
}
//8.
if(!preg_match('#^[0-9]+$#' , $_POST['tel']))
{
    $error.= '<div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark"> Numéro de téléphone non valide !! </div>';
}
echo $error;
/*
On stock tous les messages d'erreurs dans une variable que lon nomme error , si elle est vide alore le formulaire est bien remplis . on affiche donc un message de validation .
*/

//9. Faite savoir au client si il a bien remplis le formulaire
if(empty($error)){
    echo '<div class="col-md-4 offset-md-4 alert alert-success text-center text-dark"> Vous avez bien remplis le formulaire </div>';
}
}
?>

</head>
<body>

<form class="col-md-4 offset-md-4" method="post" action="">

  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputPseudo">Pseudo</label>
      <input type="text" class="form-control" id="Pseudo" placeholder="Pseudo" name="pseudo">
    </div><!-- Pseudo -->
  
  <div class="form-group col-md-6">
      <label for="passW">Password</label>
      <input type="password" class="form-control" id="passW" placeholder="Password" name="passW">
    </div>
    <div class="form-group col-md-6">
      <label for="pw"> Confirm Password</label>
      <input type="password" class="form-control" id="pw" placeholder="Enter your Password again" name="pw">
    </div> <!-- Password -->

 
    <div class="form-group col-md-6">
      <label for="inputNom">Nom</label>
      <input type="text" class="form-control" id="Nom" name="nom" placeholder="Nom">
    </div><!-- Nom -->
    
 
    <div class="form-group col-md-6">
      <label for="inputPrénom">Prénom</label>
      <input type="text" class="form-control" id="Prénom" placeholder="Prénom">
    </div><!-- Prénom -->


      <div class="form-group col-md-12">
    <label for="exampleInputEmail1">Email </label>
    <input type="text" class="form-control" id="email" name="email" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div><!-- Email -->


  <div class="form-group text-center col-md-12">
    <label for="Genre" >Genre</label>

<div class="form-group col-md-6">
  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
  <label class="form-check-label" for="defaultCheck1">
    Femme
  </label>
</div>
  
<div class="form-group col-md-6">
  <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
  <label class="form-check-label" for="defaultCheck1">
   Homme
  </label>
</div> <!-- Genre -->

  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="n° de rue, voie, boulvard...">
  </div> <!-- Address -->
  

  <div class="form-row">
    <div class="form-group col-md-8">
      <label for="inputVille">City</label>
      <input type="text" class="form-control" id="ville" action="">
    </div><!-- Ville -->

    <div class="form-group col-md-4">
      <label for="inputCp">Code Postal</label>
      <input type="text" class="form-control" name="cp" id="CP" placeholder="Ex: 94600" action="">
    </div><!-- Code postale -->
  </div>
  
 <div class="form-row">
    <div class="form-group col-md-8">
      <label for="inputn">Numéro de tél</label>
      <input type="text" class="form-control" id="numéro" name="tel" action="">
    </div><!-- Ville -->

 <button class="col-md-12 btn btn-primary" type="submit" name='submit'>Submit</button>


</body>
</html>