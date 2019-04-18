<?php
require_once('include/init.php');
extract($_POST);

if(clientConnecte())
{
    header("Location: profil.php");
}
//si action est définit dans l'URL,  cela veut dire que l'on c'est déconnecté du coup on supprime le fichier session(tmp)   
    if(isset($_GET['action']) && $_GET['action'] == 'deconnexion')
    {
        session_destroy();
    }
if(isset($_GET['action']) && $_GET['action'] == 'validate')
{
    $validate .= '<div class="col-md-6 offset-md-3 text-center alert alert-success">Félicitations !! vous êtes inscrit sur le site. Vous pouvez dès à présent vous connecter !!</div>';
}

    // echo '<pre>'; print_r($_POST); echo'</pre>';
    if($_POST)
    {
        $verif_pseudo_email = $bdd->prepare("SELECT * FROM membre WHERE pseudo = :pseudo OR email = :email");
        $verif_pseudo_email->bindValue(':pseudo', $email_pseudo, PDO::PARAM_STR);
        $verif_pseudo_email->bindValue(':email', $email_pseudo, PDO::PARAM_STR);
        $verif_pseudo_email->execute();

//Si il y a plus d'un carractère, l'internaute a bien saisie le pseudo/email, donc nous entrons dans le if 
        if($verif_pseudo_email->rowCount() > 0)
        {
            $membre = $verif_pseudo_email->fetch(PDO::FETCH_ASSOC);
//On va pouvoir comparer les mdp via la bdd.

        // echo '<pre>'; print_r($membre); echo'</pre>'; 
//On entre dans le if si les données de connexion sont valides        
            if(password_verify($mdp, $membre['mdp']));
            
                if($membre['mdp'] == $mdp)
                    {
                        foreach($membre as $key => $value)
                        {
                            if($key != 'mdp')
                            {
                                $_SESSION['membre'][$key] = $value;
                            }
                        }
                          //   echo '<pre>'; print_r($_SESSION); echo'</pre>';
                          header("Location: profil.php");
                    }
                else
                    {
                        $error .= '<div class="col-md-4  offset-md-4 alert alert-warning text-center text-dark"><strong>Mot de passe incorrect</strong> </div>';
                    }
        }
//On entre dans le else si ses données ne sont pas reconnus 
        else
        {
            $error .= '<div class="col-md-4  offset-md-4 alert alert-warning text-center text-dark">Le pseudo ou email <strong>' . $email_pseudo . '</strong> n\'est pas répertorier dans la base de donnée</div>';
        }
    }


require_once('include/header.php');
?>

<h1 class="display-4 text-center text text-info"><strong>CONNEXION</strong></h1><hr>



<!--
    1.Réaliser un formulaire de connexion avec les champs suivants : email ou pseudo / mot de passe / bouton submit 
    2.Contrôler en PHP que l'on receptionne les données du formulaire
-->

<form class="col-md-6 offset-md-3" method="post" action="">
<div class="form-row">
    <div class="form-group offset-md-3 col-md-6">
      <label for="inputPseudo" class="text-info"><strong>Pseudo</strong></label>
      <input type="text" class="form-control" id="email_pseudo" placeholder="Pseudo" name="email_pseudo">
    </div><!-- Pseudo -->
  
  <div class="form-group offset-md-3 col-md-6">
      <label for="passW" class="text-info"><strong>Password</strong></label>
      <input type="text" class="form-control" id="passW" placeholder="Password" name="mdp">
    </div>

     <button class="form-group col-md-6 offset-md-3 btn btn-info mb-2" type="submit" name='submit'>Connexion</button><hr><hr>

</div>
</form><br>
<br>

<?= $validate ?>
<?= $error ?>


<?php
require_once('include/footer.php');