<?php
require('produitmodel.php');

class produitController{
    private $model; 
    public function __construct(){
        $this -> model = new ProduitModel;
    }
    // affichage produit 
    public function boutique(){
        $produit = $this -> model -> findAll();
        $categorie = $this -> model -> findCat();
        // echo '<pre>';
        // print_r($produit);
        // echo '</pre>';
        require('produit.php');

    }
    // afficher un seul produit 
    public function affichage($id){

    }
    // afficher tous les produits d'une catégorie 
    public function categorie($categorie){

    }

    // ajouter un produit 
    public function ajouterProduit(){

    }

    // modifier un produit
    public function modifierProduit($data){

    }
    // supprimer un produit
    public function supprimerProduit(){

    }  
}
?>