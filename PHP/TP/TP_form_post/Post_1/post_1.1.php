<!-- EXERCICE 1 : 

a- Créer un formulaire d'inscription (methode "POST") avec les champs :
=> Nom
=> Prenom
=> Adresse
=> Ville
=> CP
=> Genre (f/h)
=> Description

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


    <title>TP Form_POST</title>
<?php
 
  $error = '';
//  echo '<pre>' ; print_r($_POST); echo '</pre>';
//  echo '<pre>' ; var_dump($_POST); echo '</pre>';
?>

<body>
            
            
            <h1 class="display-4 text-center text text-danger">TP Form_POST</h1>


<?php
if($_POST){ 

    if(iconv_strlen($_POST['prenom']) < 2 || iconv_strlen($_POST['prenom']) > 20){
        
        $error.='<div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark"> Le prénom doit contenir entre 2 et 20 caractères !! </div>';
    }
    if(iconv_strlen($_POST['nom']) < 2 || iconv_strlen($_POST['nom']) > 20){
        
        $error.='<div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark"> Le nom doit contenir entre 2 et 20 caractères !! </div>';
    }

    // if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        
    //     $error.='<div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark"> Email non valide !! </div>';
    // }

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
   echo '<pre>'; print_r($_POST); echo '</pre>';
}//FIN if($_POST)
 
    if($_POST){ #Ne s'affiche que si une valeur est entrée  
             echo '<div class="col-md-3 offset-md-5 alert alert-dark text-dark mx-auto text-center">';
            foreach($_POST as $key2 => $value)
            {
                echo "$key2 => $value<br>";
            }
            echo'</div>';


        }


echo $error;



?>


<form class="col-md-6 mx-auto container" method="POST" action="">    

    <div class="form-group mx-auto col-md-6">
      <label for="inputNom">Nom</label>
      <input type="text" class="form-control" id="Nom" name="nom" placeholder="Nom">
    </div><!-- Nom -->


    <div class="form-group mx-auto col-md-6">
      <label for="inputPrénom">Prénom</label>
      <input type="text" class="form-control" name="prenom" id="Prénom" placeholder="Prénom">
    </div><!-- Prénom -->


  <div class="form-group mx-auto col-md-6">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="inputAddress" name="adresse" placeholder="n° de rue, voie, boulvard...">
  </div> <!-- Address -->


    <div class="form-group mx-auto col-md-6">
      <label for="inputCity">Ville</label>
      <input type="text" class="form-control" name="ville"  id="inputCity">
    </div> <!-- Ville -->
  
    <div class="form-group col-md-6 mx-auto">
        <label for="inputSexe">Genre</label>
            <select id="inputSexe" class="form-control" name="public" >
                <option selected class="homme">Homme</option>
                <option selected class="femme">Femme</option>
                <option selected class="enfant" >Enfant</option>
            </select>
    </div><!-- Genre -->

   <div class="form-group  mx-auto col-md-4">
      <label for="inputCp">Code Postal</label>
      <input type="text" class="form-control" name="cp" id="CP" placeholder="Ex: 94600" action="">
    </div><!-- Code postale -->





<button class="col-md-6 offset-md-12 btn btn-secondary" type="submit">Submit</button>
</form>
</body>
</html>