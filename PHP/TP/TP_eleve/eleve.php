<!-- -------------------------------------------------------------PHP------------------------------------------------------------------------------- -->
<?php


$bdd = new pdo("mysql:host=localhost;dbname=eleve", 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

echo '<pre style="bg:black;color:#fff">'; echo var_dump($_POST);
echo'</pre>';
//var de msg
$nomError ="";
$preError ="";
$claError ="";
$prtError ="";
$telError ="";
$msgSuccess ="";
// verif form
 extract($_POST);

    if($_POST){
        if(empty($prenom) || iconv_strlen($prenom) < 3 || iconv_strlen($prenom) > 30)
        {
            $preError .= '<div class="col-md-4 offset-md-4 alert alert-warning text-center text-dark">Le prénom doit contenir entre 3 et 30 caractères !! </div>';
        }
        if(empty($nom) || iconv_strlen($nom) < 3 || iconv_strlen($nom) > 30)
        {
            $nomError .= '<div class="col-md-4 offset-md-4 alert alert-warning text-center text-dark">Le nom doit contenir entre 3 et 30 caractères !! </div>';
        }
        if(empty($classe) || iconv_strlen($classe) < 2 || iconv_strlen($classe) > 10)
        {
            $claError .= '<div class="col-md-4 offset-md-4 alert alert-warning text-center text-dark">Le nom de la classe doit être affecter  !! </div>';
        }
        if(empty($parents) || iconv_strlen($parents) < 3 || iconv_strlen($parents) > 20)
        {
            $prtError .= '<div class="col-md-4 offset-md-4 alert alert-warning text-center text-dark">Renseigner Le parent !! </div>';
        }
        if(!preg_match('#^[0-9]{10}+$#', $telephone)) 
        {
            $telError .= '<div class="col-md-4 offset-md-4 alert alert-warning text-center text-dark">Veuillez saisir un n° de téléphone valide </div>';
        }
       
       if(empty($nomError) && empty($preError) && empty($prtError) && empty($claError) && empty($telError))
       {
           $bdd = new pdo("mysql:host=localhost;dbname=eleve", 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
        );

        $newEleve =$bdd->prepare("INSERT INTO eleve (nom, prenom, classe, parents, telephone) VALUES (:nom, :prenom, :classe, :parents, :telephone)");
        
        foreach($_POST as $key => $value)
        {
            $newEleve ->bindValue(":$key", $value, PDO::PARAM_STR);
        }
        $newEleve->execute();
        
        $msgSuccess = '<hr><div class="col-md-6 mx-auto border border-success text-success text text-center alert alert-success">L\'élève a été enregistré</div> <hr>';
       
       }     
    
    } 
    //Fin de if($_POST)

    ?>
<?=$nomError?>
<?=$preError?>
<?=$claError?>
<?=$prtError?>
<?=$telError ?>

<!-- -------------------------------------------------------------DOCTYPE---------------------------------------------------------------------------- -->
<!-- ---------------------------------------------------------------HTML----------------------------------------------------------------------------- -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <title>Eleves</title>




</head>
<body>
    
                  <h1 class="display-4 text-center text text-warning">Eleves</h1>


<form class="col-md-6 mx-auto container" method="POST" action="" enctype="multipart/form-data">    

    <?= $msgSuccess ?>

    <div class="form-group mx-auto col-md-6">
      <label for="inputNom" class="text text-warning">Nom</label>
     
      <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom">
    </div><!-- Nom -->


    <div class="form-group mx-auto col-md-6">
      <label for="inputPrénom" class="text text-warning">Prénom</label>
     
      <input type="text" class="form-control" name="prenom" id="Prénom" placeholder="Prénom">
    </div><!-- Prénom -->


       <div class="form-group mx-auto col-md-6">
    <label for="inputclasse" class="text text-warning">classe</label>
   
    <input type="text" class="form-control" id="classe" name="classe" placeholder="Votre classe">
    </div> <!-- Classe -->


   <div class="form-group mx-auto col-md-6">
    <label for="inputparents" class="text text-warning">parents</label>
    
    <input type="text" class="form-control" id="parents" name="parents" >
    </div> <!-- Parents -->


    <div class="form-group mx-auto col-md-6">
        <label for="telephone" class="text text-warning" >Téléphone</label>
        
        <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Enter votre n° de téléphone">
    </div><!-- Téléphone -->

    <hr><ul>  
   <button type="submit" class="offset-md-5 alert-link btn btn-warning text-dark">Ajout d'èlève</button> 
    </ul><hr>
   
   


<!-- FINS LIEN ELEVE -->

<!-- AFFICHAGE PRODUITS -->


</form>
</body>
</html>

      