<?php
require_once('include/init.php');
require_once('include/header.php');

/*
   EXO :
   1. Realiser la requete permettant de selectionner le produit par rapport à l'id_produit envoyé dans l'URL
   2. Associer une méthode pour rendre le résultat exploitable
   3. Créer une fiche produit avec les informations du produit : photo / categorie / description / couleur / taille / prix / public / selecteur quantité et un bouton d'ajout au panier

*/
if(isset($_GET['id_produit'])): // si l'indice 'id_produit' est définit dans l'URL

   $resultat = $bdd->prepare("SELECT * FROM produit WHERE id_produit = :id_produit");
   $resultat->bindValue(':id_produit', $_GET['id_produit'], PDO::PARAM_INT);
   $resultat->execute();
   $id_produit = $resultat->fetch(PDO::FETCH_ASSOC);
//    echo '<pre>'; print_r($id_produit); echo '</pre>';


?>
<h1 class="dislplay-4 text-center text-secondary mt-4"><strong><?= $id_produit['titre']?></strong></h1><hr><br>

<div class=" mx-auto col-md-4 col-mb-4">
   <div class="card mb-3" style="max-width: 440px;">
   <div class="row no-gutters">
       <div class="col-md-4">
       <img src="<?= $id_produit['photo']?>" class="card-img" alt="...">
       </div>
       <div class="col-md-8">
       <div class="card-body">
           <h5 class="card-title"><?= $id_produit['titre']?></h5>
           <h5 class="card-title"><?= $id_produit['categorie']?></h5>
           <p class="card-text"><?= $id_produit['description']?></p>
           <h5 class="card-title"><?= $id_produit['couleur']?></h5>
           <p class="card-text"><?= $id_produit['taille']?></p>
           <h5 class="card-title"><?= $id_produit['prix']?></h5>
           <p class="card-text"><?= $id_produit['public']?></p>
           <label for="exampleFormControlSelect1" class="col-md-12">Quantité</label>
           <select class="form-control" id="exampleFormControlSelect1">
           <option>1</option>
           <option>2</option>
           <option>3</option>
           <option>4</option>
           <option>5</option>
           </select>
       </div>
       <button type="submit" class="btn btn-info col-md-12">Ajouter au panier</button>

       </div>
   </div>
   </div>
</div>











<?php
else:  // Si l'indice id_produit n'est pas définit dans l'URL, on redirige vers la boutique
   header("Location; boutique.php");
endif;
require_once('include/footer.php');