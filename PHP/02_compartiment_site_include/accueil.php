
<?php
require_once("include/header.php");
require_once("include/nav.php");
# require & include : 
// Pas de différence entre les deux ... sauf en cas d'erreur sur le nom du fichier:
    #-1 include génère une erreur et continue l'execution du script
    #-2 require  génère une erreur et stop l'execution du script 
//Le once vérifie di le fichier à déja été inclus, si c'est le cas il ne le ré-inclus pas !

?>
<section class="p-4 text-center border border dark" >
    Voici le contenu de la page d'Accueil <br>
    Voici le contenu de la page d'Accueil <br>
    Voici le contenu de la page d'Accueil <br>
    Voici le contenu de la page d'Accueil <br>
    Voici le contenu de la page d'Accueil <br>
    Voici le contenu de la page d'Accueil <br>
    Voici le contenu de la page d'Accueil <br>
</section>

<?php
require_once("include/footer.php");
