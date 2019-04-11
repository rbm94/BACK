<?php
require_once("include/init.php");
// <!--2.-->
        
    echo '<pre>'; print_r($_POST); echo'</pre>';
    // <!--3.-->

extract($_POST);


if($_POST)
{
    extract($_POST);
    $verif = $bdd->prepare("SELECT * FROM membre WHERE pseudo = :pseudo");
    $verif->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
    $verif->execute();
    if($verif->rowCount() > 0)
    {
        $error .= '<div class="col-md-6 offset-md-3 text-center alert alert-danger">Le pseudo <strong>' . $pseudo . '</strong> est déja existant dans la base de donnée. Merci d\'en saisir un nouveau </div>';
    }


    // <!--4.-->

    // $error = ''; 
    //Controle Mdp
    if($mdp !== $mdp_confirm)
    {
        $error .= '<div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark">Vérifier les mots de passe !! </div>';
    }


    if(!$error)
    {
        $data_insert = $bdd->prepare("INSERT INTO membre (pseudo, mdp, nom, prenom, email, civilite, ville, code_postal, adresse) VALUES (:pseudo, :mdp, :nom, :prenom, :email, :civilite, :ville, :code_postal, :adresse)");
        foreach($_POST as $key => $value)
        {
            if($key != 'mdp_confirm' && $key != 'submit')
            {
                $data_insert->bindValue(":$key", $value, PDO::PARAM_STR);
                //data_insert 
            }
        }
        $data_insert->execute();
        
        header("Location:connexion.php?action=validate"); //header() fonction prédéfinit qui permet une redirection de page 

        echo '<div class="col-md-4 offset-md-4 alert alert-success text-center text-dark">Inscription validée !! </div>';
           
    }

}

require_once("include/header.php");


?>


<h1 class="display-4 text-center text-danger">INSCRIPTION</h1>

<!--1.-->
<?= $error ?>
<form class="col-md-4 offset-md-4" method="post" action="">

  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputPseudo" class="text-danger">Pseudo</label>
      <input type="text" class="form-control" id="pseudo" placeholder="Pseudo" name="pseudo">
    </div><!-- Pseudo -->
  
  <div class="form-group col-md-6">
      <label for="passW" class="text-danger">Password</label>
      <input type="text" class="form-control" id="passW" placeholder="Password" name="mdp">
    </div>
    <div class="form-group col-md-6">
      <label for="pw" class="text-danger"> Confirm Password</label>
      <input type="text" class="form-control" id="pw" placeholder="Enter your Password again" name="mdp_confirm">
    </div> <!-- Password -->

 
    <div class="form-group col-md-6">
      <label for="inputNom" class="text-danger">Nom</label>
      <input type="text" class="form-control" id="Nom" name="nom" placeholder="Nom">
    </div><!-- Nom -->
    
 
    <div class="form-group col-md-6">
      <label for="inputPrénom" class="text-danger">Prénom</label>
      <input type="text" class="form-control" id="Prénom" name="prenom" placeholder="Prénom">
    </div><!-- Prénom -->


      <div class="form-group col-md-12">
    <label for="exampleInputEmail1" class="text-danger">Email </label>
    <input type="text" class="form-control" id="email" name="email" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div><!-- Email -->


<div class="form-group col-md-12">
    <label for="civilite" class="text text-danger">Genre</label>
  <select name="civilite" class="custom-select" id="civilite" aria-label="Example select with button addon">
        <!-- <option selected>Choose sexe </option> -->
        <option value="f">Femme</option>
        <option value="m">Homme</option>
  </select><!-- Genre -->

  </div>
  <div class="form-group col-md-12">
    <label for="inputAddress" class="text text-danger">Address</label>
    <input type="text" class="form-control" name="adresse" id="inputAddress" placeholder="n° de rue, voie, boulvard...">
  </div> <!-- Address -->
  

  <div class="form-group col-md-12">
    <div class="form-group col-md-12">
      <label for="inputVille" class="text-danger">City</label>
      <input type="text" class="form-control" id="ville" name="ville" action="">
    </div><!-- Ville -->

    <div class="form-group col-md-8 offset-md-2">
      <label for="inputCp"class="text-danger">Code Postal</label>
      <input type="text" class="form-control" name="code_postal" id="CP" placeholder="Ex: 94600" action="">
    </div><!-- Code postale -->
  


 <button class="form-group col-md-8 offset-md-2 btn btn-danger mb-2" type="submit" name='submit'>Inscription</button><hr><hr>
  </div>
</form>
<?php
require_once("include/footer.php");

