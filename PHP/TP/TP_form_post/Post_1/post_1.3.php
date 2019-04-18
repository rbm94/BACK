<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Post_1.3</title>


</head>
<body>
    
                <h1 class="display-4 text-secondary text-center">Formulaire voitures</h1>


 <form class="col-md-6 mx-auto container" method="POST" action="post_1.3_suite.php"> <!-- je remplis action pour pouvoir le récuperer sur une autre page  -->

    <div class="form-group mx-auto col-md-6">
      <label for="inputBrand">Marque</label>
      <input type="text" class="form-control" id="marque" name="marque" placeholder="marque">
    </div><!-- marque -->


    <div class="form-group mx-auto col-md-6">
      <label for="inputModel">Modele</label>
      <input type="text" class="form-control" name="modle" id="modle" placeholder="modele">
    </div><!-- modle -->


<div class="form-group mx-auto col-md-6">
      <label for="inputColor">Couleur</label>
      <input type="text" class="form-control" name="Couleur" id="Couleur" placeholder="Couleur">
    </div><!-- Couleur -->



  <div class="form-group mx-auto col-md-6">
    <label for="inputSize">Kilomètrage</label>
    <input type="text" class="form-control" id="km" name="km">
  </div> <!-- km-->


    <div class="form-group mx-auto col-md-6">
      <label for="inputGazType">Carburant</label>
      <input type="text" class="form-control" name="carburant"  id="carburant">
    </div> <!-- carburant -->


    <div class="form-group mx-auto col-md-6">
      <label for="inputdate" class="text text-info">Année du modele</label>
      <input type="date" class="form-control" id="date" name="date" placeholder="date">
    </div><!-- Date -->


    <div class="form-group mx-auto col-md-6">
      <label for="inputPrice">Prix</label>
      <input type="text" class="form-control" name="prix"  id="prix">
    </div> <!-- prix -->

               

    <div class="form-group mx-auto col-md-6 ">
        <label for="input Power">Puissance moteur</label>
        <textarea class="form-control" id="puissance" rows="3" name="puissance" placeholder="Entrer la puissance en chevaux (Chx)" ></textarea>
    </div> <!-- puissance -->


        <div class="form-group col-md-6 mx-auto">
            <label for="inputOption" >Options</label>
            <input type="text" class="form-control" id="option" name="option" placeholder="Options véhicule">
        </div><!-- option -->
    






<button class="col-md-6 offset-md-3 btn btn-secondary" type="submit">Submit</button>
</form>
</body>
</html>