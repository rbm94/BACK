<!-- EXERCICE 1 : 

a- Créer un formulaire d'inscription (methode "POST") avec les champs :
=> Prenom
=> Nom
=> email
=> Adresse
=> cade postal
=> Genre (f/h)

b- Afficher dans un tableau PHP les valeurs saisies dans le formulaire.

c- Effectuer tous les contrôles des champs
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <title>EXERCICE Formulaire 2</title>
<?php
 
  $error = '';

 echo '<pre>' ; print_r($_POST); echo '</pre>';
 echo '<pre>' ; var_dump($_POST); echo '</pre>';


if($_POST){ 

    if(iconv_strlen($_POST['prenom']) < 2 || iconv_strlen($_POST['prenom']) > 20){
        
        $error.='<div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark"> Le prénom doit contenir entre 2 et 20 caractères !! </div>';
    }
    if(iconv_strlen($_POST['nom']) < 2 || iconv_strlen($_POST['nom']) > 20){
        
        $error.='<div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark"> Le nom doit contenir entre 2 et 20 caractères !! </div>';
    }

    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        
        $error.='<div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark"> Email non valide !! </div>';
    }

    if(iconv_strlen($_POST['cp']) !==5 || !is_numeric($_POST['cp']))
    {
        $error.= '<div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark"> Code postale non valide !! </div>'; 
    }

    if(empty($error)){
        echo '<div class="col-md-4 offset-md-4 alert alert-success text-center text-dark"> Vous avez bien remplis le formulaire </div>';
    }
    if(empty($_POST['adresse']))
{
   $error.= '<div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark"> Merci de remplire le champs adresse !! </div>'; 
}

}//FIN if($_POST)
 
echo $error;



?>



<body>
<h1 class="display-4 text-center text text-info">EXERCICE Formulaire 2</h1>

<form class="col-md-6 offset-md-12 container mt-5" method="POST" action="">    

    <div class="form-group col-md-12">
      <label for="inputPrénom">Prénom</label>
      <input type="text" class="form-control" name="prenom" id="Prénom" placeholder="Prénom">
    </div><!-- Prénom -->


    <div class="form-group col-md-6">
      <label for="inputNom">Nom</label>
      <input type="text" class="form-control" id="Nom" name="nom" placeholder="Nom">
    </div><!-- Nom -->

      <div class="form-group col-md-12">
    <label for="exampleInputEmail1">Email </label>
    <input type="text" class="form-control" id="email" name="email" placeholder="Enter email">
    <small id="emailHelp"  class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div><!-- Email -->

     </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="inputAddress" name="adresse" placeholder="n° de rue, voie, boulvard...">
  </div> <!-- Address -->


   <div class="form-group col-md-4">
      <label for="inputCp">Code Postal</label>
      <input type="text" class="form-control" name="cp" id="CP" placeholder="Ex: 94600" action="">
    </div><!-- Code postale -->
  </div>


  <div class="form-group text-center col-md-12">
    <label for="Genre" name="genre">Genre</label>

<div class="form-group col-md-12">
  <input class="form-check-input" type="checkbox" value="" id="femme">
  <label class="form-check-label" for="defaultCheck1" name="femme">
    Femme
  </label><!-- Genre Femme -->
</div>
<div class="form-group col-md-12">
  <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
  <label class="form-check-label" for="defaultCheck1" name="homme">
   Homme
  </label><!-- Genre Homme -->
</div>

<button class="col-md-12  btn btn-info" type="submit">Submit</button>

</body>
</html>