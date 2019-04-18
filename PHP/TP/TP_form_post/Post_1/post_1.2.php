<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Post_1.2</title>


<?php
 if($_POST){ #Ne s'affiche que si une valeur est entrée  
                echo '<div class="col-md-3 offset-md-5 alert alert-dark text-dark mx-auto text-center">';
                foreach($_POST as $key2 => $value)
                    {
                    echo "$key2 => $value<br>";
                    }
                echo'</div>';


            }

?>


</head>
<body>
    
                <h1 class="display-4 text-secondary text-center">Listes des produits</h1>


<form class="col-md-6 mx-auto container border border-danger" method="post" action="">    

    <div class="form-group mx-auto col-md-6">
      <label for="inputTitle">Titre</label>
      <input type="text" class="form-control" id="titre" name="titre" placeholder="titre">
    </div><!-- titre -->


    <div class="form-group mx-auto col-md-6">
      <label for="inputColor">Couleur</label>
      <input type="text" class="form-control" name="Couleur" id="Couleur" placeholder="Couleur">
    </div><!-- Couleur -->


  <div class="form-group mx-auto col-md-6">
    <label for="inputSize">Taille</label>
    <input type="text" class="form-control" id="taille" name="taille">
  </div> <!-- taille -->


    <div class="form-group mx-auto col-md-6">
      <label for="inputWeight">Poids</label>
      <input type="text" class="form-control" name="poids"  id="poids">
    </div> <!-- poids -->


    <div class="form-group mx-auto col-md-6">
      <label for="inputPrice">Prix</label>
      <input type="text" class="form-control" name="prix"  id="prix">
    </div> <!-- prix -->


        <div class="form-group mx-auto col-md-6 ">
            <label for="exampleFormControlTextarea1">Description</label>
            <textarea class="form-control" id="description" rows="3" name="description" placeholder="Entrer la description" ></textarea>
        </div> <!-- Déscription -->


        <div class="form-group col-md-6 mx-auto">
            <label for="inputStock" >Stock</label>
            <input type="text" class="form-control" id="stock" name="stock" placeholder="Nombre de produit">
        </div><!-- Stock -->
    
<!-- Fournisseur -->






<button class="col-md-6 mx-auto0 btn btn-secondary" type="submit">Submit</button>
</form>
</body>
</html>