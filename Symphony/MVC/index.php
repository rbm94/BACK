<?php
// Procédural (hors MVC)
/*
www.maboutique.com/index.php
www.maboutique.com/boutique.php
www.maboutique.com/fiche_produit.php
www.maboutique.com/inscription.php
 */
// En MVC (Model View Controller)
// www.maboutique.com/index.php?controller=produits&action=boutique
// $a = new pro duitController;
// $a-> boutique();

// www.maboutique.com/index.php?controller=produits&action=affichage&id=165
// $a = new produitController;
// $a-> affichage();

// www.maboutique.com/index.php?controller=produits&action=inscription 
// $a= new produitController;
// $a-> inscription();

// réecriture de l'url

// <www.maboutique.com/produit/affichage/165
// $a = new produitController;
// $a-> affichage(165);


require('produitController.php');

$a = new produitController;
$a -> boutique();
?>
