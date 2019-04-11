<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <title class="text text-Danger">Formulaire entreprise</title>
    <?php
    $pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES utf8' ));

    if($_POST)
        {
            echo '<pre>' ; print_r($_POST); echo '</pre>';
            $req = "INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES ('$_POST[prenom]', '$_POST[nom]','$_POST[sexe]', '$_POST[service]', '$_POST[date_embauche]', '$_POST[salaire]')";

            $resultat = $pdo->exec($req);//on utilise la superglobale $_POST pour aller crochetr chaque champs du formulaire afin de récuperer les données.

            echo $req;
        
            echo '<div class="col-md-6 offset-md-3 alert alert-info text-center">L\'employé <strong>' .$_POST['nom'] .'</strong> a bien été enregistré !!</div>';
    
            // $result = $pdo->query("SELECT * FROM employes WHERE id_employes = 415");  

            // $employe = $result->fetch(PDO::FETCH_ASSOC);
            // echo '<pre>' ; print_r($employe); echo '</pre>';

            // echo '<div class="col-md-4 offset-md-4 alert alert-info text-center text-dark">'; 
            // foreach($employe as $key => $value)
            // {
            //     if($key != 'id_employes')
            //     {
            //         echo "$key : $value <hr>";
            //     }
            // }
            // echo '</div>';
            

            
    }
    ?>






</head>
<body>
    <form class="col-md-4 offset-md-4" method="post" action="">

  <div class="form-row">
   
    
    <div class="form-group col-md-6">
      <label for="inputPrenom" class="text text-info">Prénom</label>
      <input type="text" class="form-control" id="Prenom" placeholder="Prenom" name="prenom">
    </div><!-- Prénom -->
  

    <div class="form-group col-md-6">
      <label for="inputNom" class="text text-info">Nom</label>
      <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom">
    </div><!-- Nom -->
  
  
<div class="form-group col-md-12">
    <label for="sexe" class="text text-info">Genre</label>
  <select name="sexe" class="custom-select" id="sexe" aria-label="Example select with button addon">
        <!-- <option selected>Choose sexe </option> -->
        <option value="f">Femme</option>
        <option value="m">Homme</option>
  </select><!-- Genre -->

  <!-- <div class="input-group-append">
    <button class="btn btn-outline-secondary" type="button">Button</button>
  </div>
</div>Bouton -->


  </div>
  <div class="form-group col-md-8">
    <label for="inputService" class="text text-info">Service</label>
    <input type="text" class="form-control" id="service" name="service" placeholder="Votre poste">
  </div> <!-- Poste proffessionnel  -->
  

    <div class="form-group col-md-6">
      <label for="inputdate" class="text text-info">date d'embauche</label>
      <input type="date" class="form-control" id="date" name="date_embauche" placeholder="date">
    </div><!-- Prénom -->



    <div class="form-group col-md-6">
      <label for="inputSalaire" class="text text-info">Salaire</label>
      <input type="text" class="form-control" id="Salaire" name="salaire" placeholder="1500€" action="">
    </div><!-- Salaire -->
  </div>
  

 <button class="col-md-12 btn btn-primary" type="submit" name='submit'>Submit</button>




</body>
</html>