<?php
// $bdd = new pdo("mysql:host=localhost;dbname=logement", 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

// echo '<pre style="bg:black;color:#fff">'; echo var_dump($_POST); echo'</pre>';


$bdd= '';
$error = '';
$pdo= '';

//  extract($_POST);

if($_POST){

    if(iconv_strlen($_POST['titre']) < 2 || iconv_strlen($_POST['titre']) > 30){
        
        echo '<div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark">Le titre doit contenir entre 2 et 30 caractères !! </div>';
    }
    
    
    if(iconv_strlen($_POST['cp']) !==5 || !is_numeric($_POST['cp']))
    {
        $error=  '<div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark"> Code postale non valide !! </div>';
    }
    
    if(iconv_strlen($_POST['adresse']) < 2 || iconv_strlen($_POST['adresse']) > 30)
    {
        $error .= '<div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark"> veuillez remplir le champ adresse!! </div>';
    }
    
    if(iconv_strlen($_POST['ville']) < 2 || iconv_strlen($_POST['ville']) > 20){
        
        $error .= '<div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark"> veuillez remplir le champ ville!! </div>';
    }
    
    if(iconv_strlen($_POST['surface']) < 2 || iconv_strlen($_POST['surface']) > 10){
        
        echo '<div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark">La surface doit contenir des caractères numérique  !! </div>';
    }
    if(iconv_strlen($_POST['prix']) < 2 || iconv_strlen($_POST['prix']) > 10){
        
        echo '<div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark">Le prix doit contenir des caractères numérique  !! </div>';
    }
    echo $error;
    
    
    if(empty($error))
    {
        echo '<div class="col-md-4 offset-md-4 alert alert-success text-center text-dark"> Vous avez bien remplis le formulaire </div>';
    }
    
    
    //Connexion a la ba&se de donné logement 
    $bdd = new PDO('mysql:host=localhost;dbname=immobilier', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES utf8'));

    // OUVERTURE  NVX IF($_POST)
    
    if($_POST) // si on valide le formulaire, on entre dans la condition
    {
        $resultat = $bdd->exec("INSERT INTO logement (titre, adresse, ville, cp, surface, prix, photo, type, description) VALUES ('$_POST[titre]', '$_POST[adresse]', '$_POST[ville]', '$_POST[cp]', '$_POST[surface]', '$_POST[prix]', '$_POST[photo]', '$_POST[type]', '$_POST[description]')");
        // On utilise la superglobale $_POST pour aller crocheter à chaque champs du formulaire afin de récupérer sa valeur
        
        echo '<hr><div class="col-md-6 mx-auto border border-success text-success text text-center alert alert-success">Le bien' . $_POST['titre'] . 'à bien été ajouté</div> <hr>';
        
    }
}

if($_POST)
{

    $result = $pdo->query("SELECT * FROM logement");
    $logement = $result->fetchAll(PDO::FETCH_ASSOC);
    
    echo '<pre>'; print_r($logement); echo '</pre>';
}


   if(isset($_GET['id_logement']))
{
    $resultat = $bdd->prepare("SELECT * FROM logement WHERE id_logement = :id_logement");
    $resultat->bindValue(':id_logement', $id_logement, PDO::PARAM_INT);
    $resultat->execute();

    $produit_actuel = $resultat->fetch(PDO::FETCH_ASSOC);
    echo '<pre>'; print_r($produit_actuel); echo '</pre>';
}

$titre = (isset($produit_actuel['titre'])) ? $produit_actuel['titre'] : '';
$adresse = (isset($produit_actuel['adresse'])) ? $produit_actuel['adresse'] : '';
$ville = (isset($produit_actuel['ville'])) ? $produit_actuel['ville'] : '';
$cp = (isset($produit_actuel['cp'])) ? $produit_actuel['cp'] : '';
$surface = (isset($produit_actuel['surface'])) ? $produit_actuel['surface'] : '';
$prix = (isset($produit_actuel['prix'])) ? $produit_actuel['prix'] : '';
$photo = (isset($produit_actuel['photo'])) ? $produit_actuel['photo'] : '';
$type = (isset($produit_actuel['type'])) ? $produit_actuel['type'] : '';
$description = (isset($produit_actuel['description'])) ? $produit_actuel['description'] : '';

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Evaluation Immobillier</title>

    <!-- Liens :-->
<!-- Bootstrap -->
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">



</head>
<body>
     <h1 class="display-4 text-secondary text-center">Nouveau Logement</h1>


<!-- Début de balise Form -->
<form class="form-group mx-auto col-md-8" method="post"  action="logement1.php" enctype="multipart/form-data">

    



    <div class="form-group mx-auto col-md-6">
      <label for="inputTitle">Titre</label>
      <input type="text" class="form-control" id="titre" name="titre" placeholder="titre"  value="<?= $titre ?>">
    </div><!-- titre -->


  <div class="form-group mx-auto col-md-6">
    <label for="inputAddresse">Addresse</label>
    <input type="text" class="form-control" name="adresse" id="inputAddresse" placeholder="n° de rue, voie, boulvard..." value="<?= $adresse ?>">
  </div> <!-- Address -->
  


    <div class="form-group mx-auto col-md-6">
      <label for="inputVille">Ville</label>
      <input type="text" class="form-control" name="ville" id="ville" action="" value="<?= $ville ?>">
    </div> <!-- Ville -->


    <div class="form-group mx-auto col-md-6">
      <label for="inputCp">Code Postal</label>
      <input type="text" class="form-control" name="cp" id="cp" placeholder="Ex: 94600" action="" value="<?= $cp ?>">
    </div><!-- Code postale -->
 

      <div class="form-group mx-auto col-md-6">
        <label for="exampleFormControlTextarea1">Surface</label>
        <textarea class="form-control" id="surface" name="surface" valeur="<?= $surface ?>"></textarea>
    </div> <!-- Surface -->
  


    <div class="form-group mx-auto col-md-6">
        <label for="inputPrice">Prix</label>
        <input type="text" class="form-control" name="prix"  id="prix" value="<?= $prix ?>">
    </div> <!-- prix -->


    <div class="form-group col-md-6 mx-auto">
        <label for="exampleFormControlFile1">Photo</label>
        <input type="file" class="form-control-file" id="photo" name="photo">
    <!-- Photo -->

     <?php if(!empty($photo)): ?>
        <em>Vous pouvez uploader une nouvelle photo si vous souhaitez la changer</em><br>
        <img src="<?= $photo ?>" alt="<?= $titre ?>" class="card-img-top">
    <?php endif; ?>
    <input type="hidden" id="photo_actuelle" name="photo_actuelle" value="<?= $photo ?>">
</div>


    <div class="form-group mx-auto col-md-6">
        <label for="type">Type</label>

        <div class="form-group mx-auto col-md-6">
            <input class="form-check-input" type="radio" aria-label="Radio button" value="" id="type" name="type" value="<?= $type ?>">
            <label class="form-check-label" for="defaultCheck1">Maison</label>
        </div> <!-- Type -->


        <div class="form-group mx-auto col-md-6">
            <input class="form-check-input" type="radio" name="type" aria-label="Radio button" value="" id="type" value="<?= $type ?>">
            <label class="form-check-label" for="defaultCheck1">Appartement</label>
        </div> <!-- Type -->


        <div class="form-group mx-auto col-md-6">
            <input class="form-check-input" type="radio" aria-label="Radio button" name="type" value="" id="type" value="<?= $type ?>">
            <label class="form-check-label" for="defaultCheck1">Studio</label>
        </div> <!-- Type -->

    </div>


    <div class="form-group mx-auto col-md-6">
        <label for="exampleFormControlTextarea1">Description</label>
        <textarea class="form-control" id="description" rows="3" name="description" placeholder="Entrer la description"  value="<?= $description?>"></textarea>
    </div> <!-- Déscription -->


    <!-- Bouton submit -->
    
    <button class="col-md-12 btn btn-primary" type="submit" >Submit</button>

    <!-- Bouton submit -->

</form>
    <!--Fin de ma balise form-->
</body>
</html>