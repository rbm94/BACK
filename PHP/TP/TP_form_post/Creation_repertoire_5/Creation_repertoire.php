<?php

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <title>Creation d'un répertoire</title>




</head>
<body>
    
                  <h1 class="display-4 text-center text text-danger">Creation d'un répertoire</h1>


<form class="col-md-6 mx-auto container" method="POST" action="">    

    <div class="form-group mx-auto col-md-6">
      <label for="inputNom">Nom</label>
      <input type="text" class="form-control" id="Nom" name="nom" placeholder="Nom">
    </div><!-- Nom -->


    <div class="form-group mx-auto col-md-6">
      <label for="inputPrénom">Prénom</label>
      <input type="text" class="form-control" name="prenom" id="Prénom" placeholder="Prénom">
    </div><!-- Prénom -->

     <div class="form-group">
        <label for="telephone">Téléphone</label>
        <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Enter telephone">
    </div><!-- Téléphone -->

    <div class="form-group col-md-8">
    <label for="inputProfession" class="text text-info">Profession</label>
    <input type="text" class="form-control" id="profession" name="profession" placeholder="Votre poste">
    </div> <!-- Poste proffessionnel -->

    <div class="form-group mx-auto col-md-6">
      <label for="inputCity">Ville</label>
      <input type="text" class="form-control" name="ville"  id="inputCity">
    </div> <!-- Ville -->

   <div class="form-group  mx-auto col-md-4">
      <label for="inputCp">Code Postal</label>
      <input type="text" class="form-control" name="cp" id="CP" placeholder="Ex: 94600" action="">
    </div><!-- Code postale -->



  <div class="form-group mx-auto col-md-6">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="inputAddress" name="adresse" placeholder="n° de rue, voie, boulvard...">
  </div> <!-- Address -->

    
      <div class="form-group">
        <label for="dateBd">birthday</label>
        <input type="date" class="form-control" id="birthday" name="birthday">
    </div><!-- Date de naissance -->
  
    <div class="form-group col-md-6 mx-auto">
        <label for="inputSexe">Genre</label>
            <select id="inputSexe" class="form-control" name="public" >
                <option selected class="homme">Homme</option>
                <option selected class="femme">Femme</option>
                <option selected class="enfant" >Enfant</option>
            </select>
    </div><!-- Genre -->


    <div class="form-group mx-auto col-md-6 ">
            <label for="exampleFormControlTextarea1">Description</label>
            <textarea class="form-control" id="description" rows="3" name="description" placeholder="Entrer la description" ></textarea>
        </div> <!-- Déscription -->



</body>
</html>