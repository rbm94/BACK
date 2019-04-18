<?php
require_once("include/init.php");

if(!clientConnecte())
{
    header("Location: connexion.php"); //Si l'internaute n'est pas connécté, il ne peut pas aller sur la page profil donc il sera  revoyer vers la page connexion.
}
require_once("include/header.php");

// echo '<pre>'; print_r($_SESSION); echo '</pre>'
?>
<!-- Exo: Afficher le pseudo de l'internaute en passant par son fichier session 
    -->
<div class="container">
 <h1 class="display-4 text-center alert alert-info">Yo, <strong class="text-info text-center"> <?= $_SESSION['membre']['pseudo']?></strong></h1>

<!--Réaliser une page profil en affichant toutes les données contenus dans la session sauf l'id_membre et le statut
    --> 

<table class="col-md-12 mx-auto table table-secondary text text-center text-info">
<!--Les ':' et endif / endforeach remplace les accolades {}  
    -->
    <?php foreach($_SESSION['membre'] as $key => $value):?>
    <tr>
        <?php  if($key != 'id_membre' && $key != 'statut'):?>
        <th><?= $key ?></th><td><?= $value ?></td>
<?php endif; ?>
    </tr>
<?php endforeach; ?>

</table>

 
 <?php
 //si le statut est à 1 = admin du site, si non simple membre  
 if($_SESSION['membre']['statut'] == 1)
 $statut = 'ADMIN';
 else // membre classique si autre que 1
 $statut = 'MEMBRE';
 ?>
<h3 class="text-center">Vous êtes <strong class="text-info"><?= $statut ?></strong> du site </h3>

 </div>

<?php
require_once("include/footer.php");

