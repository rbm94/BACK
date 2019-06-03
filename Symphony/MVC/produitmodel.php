<?php
// MVC/produitsModel.php
class produitModel{
    private $pdo;

    public function __construct(){
        $this -> pdo = new PDO('mysql:host=localhost;dbname=site', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,));

    }
    // La mission de produitModel est d'interagire avec la table produit dans la bdd(Requête SQL)

    // récuperer tous les produits 
    public function findAll(){
        $resultat = $this -> pdo -> query('SELECT * FROM produit');
        $produit = $resultat -> fetchAll();
        return $produit;

    }
    // nouvelle fonction pour récuperer toutes les catégories
    public function findCat(){
        $resultat = $this -> pdo -> query('SELECT DISTINCT(categorie) FROM produit');
        $categorie = $resultat -> fetchAll();
        return $categorie; 

    }
    // récuperer un  produit grace a l'ID

    // récuperer tous les prouits par catégorie 
    
    // insert  
    // update
    // delete 

}

?>