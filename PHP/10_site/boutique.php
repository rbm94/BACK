<?php
require_once("include/init.php");
extract($_POST);

require_once("include/header.php");
?>
<div class="container">
   <div class="row">

      <div class="col-lg-3">

        <h1 class="my-4 text-center text-info ">Welcome to my Shop hoes</h1>
        <div class="list-group">
        <?php
        //Exo: 1. Requete de selection des catégoreies de produits distinct en BDD
        //     2. Boucler l=sur chaque catégorie et créer un lien . 

             $resultat = $bdd->query("  SELECT DISTINCT categorie FROM produit");
            //  echo '<pre>'; print_r($resultat); echo'</pre>';
      
            while($categorie = $resultat->fetch(PDO::FETCH_ASSOC)):
            //  echo '<pre>'; print_r($categorie); echo'</pre>';
        ?>
        
          <a href="?categorie=<?= $categorie['categorie'] ?>" class="list-group-item alert-link text-secondary text-center"><?= $categorie['categorie'] ?></a>
  
          <?php endwhile; ?>
        </div>
      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div id="carouselExampleIndicators" class="carousel my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2" class="active"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block img-fluid "  style=" height: 450px;
    width: 850px;"  src="<?= URL ?>photo/logo.jpg"  alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" style=" height: 450px;
    width: 850px;" src="<?= URL ?>photo/logo.jpg"  alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" style=" height: 450px;
    width: 850px;"src="<?= URL ?>photo/nike.jpg"  alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next offset-2" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

        <div class="row">   
        
        <?php if(isset($_GET['categorie'])):

            $resultat = $bdd->prepare("SELECT * FROM produit WHERE categorie = :categorie");
            $resultat->bindValue(':categorie', $_GET['categorie'], PDO::PARAM_STR);
            $resultat->execute();
            else : //
                 $resultat = $bdd->prepare("SELECT * FROM produit");
                 $resultat->execute();
            endif; 


            while($produit = $resultat->fetch(PDO::FETCH_ASSOC)):

                // echo '<pre>'; print_r($produit);echo'</pre>';
        ?>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="fiche_produit.php?id_produit=<?= $produit['id_produit'] ?>"><img class="card-img-top" src="<?= $produit['photo'] ?>" alt="<?php $produit['titre']?>"></a>
              <div class="card-body">
                <h4 class="card-title text-center">
                  <a href="fiche_produit.php?id_produit=<?= $produit['id_produit'] ?>" class="alert-link text-dark"><?= $produit['titre'] ?></a>
                </h4>
                <h5 class="text-center"><?= $produit['prix'] ?>€</h5>
                <p class="card-text text-center"><?= $produit['description']?></p>
              </div>
              <div class="card-footer text-center">
                <a href="fiche_produit.php?id_produit=<?= $produits['id_produit'] ?>" class="alert-link text-dark">Voir les détails<i class="fas fa-search"></i></a>
              </div>
            </div>
          </div>


            <?php endwhile; ?>
           
        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->









<?php
require_once("include/footer.php");
?>