<!-- LIENS FONTAWSOME -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">  
<!-- FIN LIENS FONTAWSOME -->

<?php


require_once("../include/init.php");

    extract($_POST);
    extract($_GET);

    // Si l'internaute n'est pas connecté et n'est pas ADMIN, il n'a rien à faire ici, on le redirige vers la page connexion.php
        if(!clientConnecteAdmin())
        {
            header("Location:" . URL . "connexion.php");
        }
//Suppression d'un produit 
if(isset($_GET['action']) && $_GET['action'] == 'suppression')
{
//  echo 'suppression produit'; 
    $supp_prod = $bdd->prepare("DELETE FROM produit WHERE id_produit = :id_produit");
        
        $supp_prod->bindValue(':id_produit', $id_produit,PDO::PARAM_INT);

            $supp_prod->execute();

    $_GET['action'] = 'affichage';

    $validate .= "<div class='alert alert-danger col-md-6 offset-md-3 text-center'>Le produit n°<strong>$id_produit</strong> à bien été supprimé !!</div>";}



//----------- ENREGISTREMENT PRODUIT
if($_POST)
{
    $photo_bdd = '';
    if(isset($_GET['action']) && $_GET['action'] == 'modification')
    {
        $photo_bdd = $photo_actuelle; // si on soubhaite conserver la même photo en cas de modification, on affecte la valeur du champ photo 'hidden', c'est à dire l'URL de la photo selectionnée en BDD
    }

    if(!empty($_FILES['photo']['name'])) // on vérifie que l'indice 'name' dans la superglobale $_FILES n'est pas vide, cela veut dire que l'on a bien uploder une photo
    {
        $nom_photo = $reference . '-' . $_FILES['photo']['name']; // on redéfinit le nom de la photo en concaténant le réference saisi dans le formulaire avec le nom de la photo
        //echo $nom_photo . '<br>';

        $photo_bdd = URL . "photo/$nom_photo"; // on définbit l'URL de la photo,c'est ce que l'on conservera en BDD
        //echo $photo_bdd . '<br>';

        $photo_dossier = RACINE_SITE . "photo/$nom_photo"; // on définit le chemin physique de la photo sur le disue dur du serveur, c'est ce qui nous permettra de copier la photo dans le dossier photo
        //echo $photo_dossier . '<br>';

        copy($_FILES['photo']['tmp_name'], $photo_dossier); // copy() est une fonction prédéfinie qui permet de copierla photo dans le dossier photo . arguments : copy(nom_temporaire_photo, chemin de destination)
    }

// Réaliser une requête d'insertion pour un produit de table produit (sauf "id_produit")

                if(isset($_GET['action']) && $_GET['action'] == 'ajout')
                {
                    $data_insert = $bdd->prepare("INSERT INTO produit(reference, categorie, titre, description, couleur, taille, public, photo, prix, stock) VALUES (:reference, :categorie, :titre, :description, :couleur, :taille, :public, :photo, :prix, :stock)");
                            $_GET['action'] = 'affichage';
                    $validate .= "<div class='alert alert-success col-md-6 offset-md-3 text-center'>Le produit n°<strong>$reference</strong> à bien été ajouté !!</div>";
                }
                else
                {
                    
                    $data_insert = $bdd->prepare("UPDATE produit SET reference = :reference, categorie = :categorie, titre = :titre, description = :description, couleur = :couleur, taille = :taille, public = :public, photo = :photo, prix = :prix, stock = :stock WHERE id_produit = $id_produit");
                        $_GET['action'] = 'affichage';

                            $validate .= "<div class='alert alert-info col-md-6 offset-md-3 text-center'>Le produit n°<strong>$id_produit</strong> à bien été modifié !!</div>";
        
                            // echo '<pre>';print_r($id_produit); echo'</pre>';
                }




    foreach($_POST as $key => $value)
        {      
            if($key != 'photo_actuelle')
            {
                $data_insert->bindValue(":$key", $value, PDO::PARAM_STR);
                //data_insert insertion de donnée 
            }
        }
        $data_insert->bindValue(":photo", $photo_bdd, PDO::PARAM_STR);
        $data_insert->execute(); //éxecution du "$data_insert" grace à 'execute();'
    
}

    require_once("../include/header.php");
    // echo '<pre>'; print_r($_POST); echo '</pre>';
    // echo '<pre>'; print_r($_FILES); echo '</pre>';

?>
    <!-- LIENS PRODUITS -->
<ul class="col-md-4 offset-md-4 list-group mt-4 text-center">
<li class="list-group-item bg-dark text-center text-info">BACK OFFICE</li>
<li class="list-group-item bg-secondary text-center text-danger"><a href="?action=affichage" class="text-info">--AFFICHAGE PRODUITS--</a></li>
<li class="list-group-item bg-secondary text-center text-danger"><a href="?action=ajout" class="text-info">-AJOUT PRODUITS-</a></li>

</ul>
    <!-- FIN LIENS PRODUITS -->


    <!-- AFFICHAGE PRODUITS -->

    <?php if(isset($_GET['action']) && $_GET['action'] == 'affichage'): ?>

<h1 class="display-4 text-info text-center">Listes des produits</h1>
<?php

echo $validate;
$result = $bdd->query("SELECT * FROM produit");

$produits = $result->fetchAll(PDO::FETCH_ASSOC);
// echo '<pre>'; print_r($produits); echo '</pre>';
?>



    <table class="table table-bordered text-center"><tr>


            <?php
                foreach($produits[0] as $key => $value):?>

            <th><?=strtoupper($key)?></th>
            
            <?php  endforeach; ?>
                    <th>Modifier</th>
                    <th>Supprimer</th>  
            </tr>

            <?php  foreach($produits as $key => $tab): ?>
            <tr>
            <?php  foreach($tab as $key2 => $value): ?>

                <?php if($key2 == 'photo'): ?>
                    <td><img src="<?= $value ?>" alt="<?= $tab['titre'] ?>"></td>
                <?php else: ?>
                    <td><?= $value ?></td>
                <?php endif; ?>

    <?php  endforeach; ?>
    <th><a href="?action=modification&id_produit=<?= $tab['id_produit']?>"><i class="fas fa-pen text-dark"></i></a></th>
        <th><a href="?action=suppression&id_produit=<?= $tab['id_produit']?>" onclick="return(confirm('Êtes vous certains ?'))"><i class="fas fa-trash text-danger"></i></a></th>    
        </tr>
<?php  endforeach; ?>
</table>

<?php endif; ?>
<!-- FIN AFFICHAGE PRODUITS -->
<hr>

<?php if(isset($_GET['action']) && ($_GET['action'] == 'ajout' || $_GET['action'] == 'modification')): ?>

        <h1 class="display-4 text-info text-center"><?= strtoupper($action)?> D'UN PRODUIT</h1>
  <!-- <?php echo '<pre>'; print_r($action); echo '</pre>';?> -->

  <hr>
    <?php
        if(isset($_GET['id_produit']))
        {
            $resultat =$bdd->prepare("SELECT *FROM produit WHERE id_produit = :id_produit ");        
            $resultat->bindValue(':id_produit', $id_produit, PDO::PARAM_INT);
            $resultat->execute();
            
            $produits_actuel = $resultat->fetch(PDO::FETCH_ASSOC);
            // echo '<pre>'; print_r($produits_actuel);echo'</pre>';

        }

        
    $reference = (isset($produits_actuel['reference'])) ? $produits_actuel ['reference'] : '';
    $categorie = (isset($produits_actuel['categorie'])) ? $produits_actuel ['categorie'] : '';
    $titre = (isset($produits_actuel['titre'])) ? $produits_actuel ['titre'] : '';
    $description = (isset($produits_actuel['description'])) ? $produits_actuel ['description'] : '';
    $couleur = (isset($produits_actuel['couleur'])) ? $produits_actuel ['couleur'] : '';
    $taille = (isset($produits_actuel['taille'])) ? $produits_actuel ['taille'] : '';
    $public = (isset($produits_actuel['public'])) ? $produits_actuel ['public'] : '';
    $photo = (isset($produits_actuel['photo'])) ? $produits_actuel ['photo'] : '';
    $prix = (isset($produits_actuel['prix'])) ? $produits_actuel ['prix'] : '';
    $stock = (isset($produits_actuel['stock'])) ? $produits_actuel ['stock'] : '';
    
?>

<form  method="post" action="" class="col-md-6 offset-md-3 form1" enctype="multipart/form-data"><!-- enctype : obligatoire en PHP pour recolter les informations d'1 fichier uploadé -->
<h1 class=" text text-center alert alert-dark"><strong class="text text-secondary">Bienvenue dans le gestionnaire de boutique !!</strong></h1><hr>
<!-- Réference -->
<div class="form-group col-md-6 mx-auto">
    <label for="reference ">Référence</label>
    <input type="text" class="form-control" id="reference" name="reference" placeholder="Entrer réference" value="<?= $reference ?>">
</div>
<!-- Catégorie -->
<div class="from-row">
<div class="form-group col-md-6 mx-auto">
    <label for="categorie">Catégorie</label>
    <input type="text" class="form-control" id="catégorie" name="categorie" placeholder="Entrer catégorie" value="<?= $categorie?>" >
</div>
<!-- Titre -->
<div class="form-group col-md-6 mx-auto">
            <label for="exampleInputEmail1">Titre</label>
            <input type="text" class="form-control" id="titre" name="titre" placeholder="Enter le titre" value="<?= $titre ?>">
        </div>
<!-- Déscription -->
        <div class="form-group col-md-6 mx-auto">
            <label for="exampleFormControlTextarea1">Description</label>
            <textarea class="form-control" id="description" rows="3" name="description" placeholder="Entrer la description" value="<?= $description ?>"></textarea>
        </div>
<!-- Couleur -->
        <div class="form-group col-md-6 mx-auto">
            <label for="exampleInputEmail1">Couleur</label>
            <input type="text" class="form-control" id="couleur" name="couleur" placeholder="Indiquer la couleur" value="<?= $couleur ?>">
        </div>
<!-- Taille -->
       <div class="form-group col-md-6 mx-auto">
            <label for="exampleFormControlSelect1">Taille</label>
            <select class="form-control" id="taille" name="taille" value="taille" value="<?= $taille ?>">
            <option value="XS"<?php if($taille == 'XS') echo 'selected'; ?>>XS</option>
            <option value="S" <?php if($taille == 'S') echo 'selected'; ?>>S</option>
            <option value="M" <?php if($taille == 'M') echo 'selected'; ?>>M</option>
            <option value="L" <?php if($taille == 'L') echo 'selected'; ?>>L</option>
            <option value="XL"<?php if($taille == 'L') echo 'selected'; ?>>XL</option>
            </select>
        </div>
<!-- Genre -->

    <div class="form-group col-md-6 mx-auto">
      <label for="inputSexe">Genre</label>
      <select id="inputSexe" class="form-control" name="public" >
        <option selected class="homme" <?php if($public == 'homme') echo 'selected'; ?>>Homme</option>
        <option selected class="femme" <?php if($public == 'femme') echo 'selected'; ?>>Femme</option>
        <option selected class="enfant" <?php if($public == 'enfant') echo 'selected'; ?>>Enfant</option>
      </select>
    </div>

<!-- Photo -->
        <div class="form-group col-md-6 mx-auto">
            <label for="exampleFormControlFile1">Photo</label>
            <input type="file" class="form-control-file" id="photo" name="photo">
        </div>
        <?php if(!empty($photo)): ?>
        <em>Vous pouvez uploader une nouvelle photo</em><br>
        <img src="<?= $photo?>" alt="<?= $titre?>" >
<?php endif; ?>

        <input type="hidden" id="photo_actuelle" name="photo_actuelle" value="<?= $photo ?>">

        <div class="form-group col-md-6 mx-auto">
            <label for="exampleInputEmail1">Prix</label>
            <input type="text" class="form-control" id="prix" name="prix" placeholder="Enter un prix" value="<?= $prix ?>">
        </div>

<!-- Stock -->
        <div class="form-group col-md-6 mx-auto">
            <label for="exampleInputEmail1" >Stock</label>
            <input type="text" class="form-control" id="stock" name="stock" placeholder="Nombre de produit" value="<?= $stock ?>">
        </div>
    </div>
    <!-- Boutton -->
        <button type="submit" class="form-group col-md-6 mx-auto btn btn-dark ">Valider</button>
    
</form>



<?php
endif;
require_once("../include/footer.php");
?>