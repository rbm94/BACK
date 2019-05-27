<?php
require_once('init.php');
extract($_POST);
$tab = array();

if(!empty($personne)){

    $result = $bdd->query("INSERT INTO employes (prenom) VALUE ('$personne')");
    $tab['resultat']= "<div class='col-md-6 offset-md-3 alert alert-success text-center'>L'employé $personne a bien été ajouter</div>";
}
else
{
     $tab['resultat']= "<div class='col-md-6 offset-md-3 alert alert-danger text-center'>veuillez saisir un prénom</div>";
}

echo json_encode($tab);