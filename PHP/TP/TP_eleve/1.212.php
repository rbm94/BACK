<!-- <?php


            if(isset($_GET['action']) && $_GET['action'] == 'ajout')
                {
                    $data_insert = $bdd->prepare("INSERT INTO eleve(nom, prenom, classe, parents, telephone) VALUES (:nom, :prenom, :classe, :parents, :telephone)");
                            $_GET['action'] = 'affichage';
                    $validate .= "<div class='alert alert-success col-md-6 offset-md-3 text-center'>l'èlève <strong>$nom, $prenom </strong> à bien été ajouté !!</div>";
                }

            else
                {
                    
                    $data_insert = $bdd->prepare("UPDATE produit SET reference = :reference, categorie = :categorie, titre = :titre, description = :description, couleur = :couleur, taille = :taille, public = :public, photo = :photo, prix = :prix, stock = :stock WHERE id_produit = $id_produit");
                        $_GET['action'] = 'affichage';

                            $validate .= "<div class='alert alert-info col-md-6 offset-md-3 text-center'>Le produit n°<strong>$id_produit</strong> à bien été modifié !!</div>";
        
                            // echo '<pre>';print_r($id_produit); echo'</pre>';
                }

                $nom = (isset($eleve['nom'])) ? $eleve['nom'] : '';
                $prenom = (isset($eleve['prenom'])) ? $eleve['prenom'] : '';
                $classe = (isset($eleve['classe'])) ? $eleve['classe'] : '';
                $parents = (isset($eleve['parents$parents'])) ? $eleve['parents$parents'] : '';
                $telephone = (isset($eleve['telephone'])) ? $eleve['telephone'] : '';


?>


<?php if(isset($_GET['action']) && $_GET['action'] == 'affichage'): ?>
 <?php endif; ?> -->


extract($_GET);


    <?php 
echo $validate;
$result = $bdd->query("SELECT * FROM produit");
$produits = $result->fetchAll(PDO::FETCH_ASSOC);
//echo '<pre>'; print_r($produits);echo '</pre>';
?>