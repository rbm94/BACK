
<?php
      echo '<pre>'; print_r($_GET); echo'</pre>'; 
      $answer = "";     
        
    if(isset($_GET['answer']) && $_GET['answer'] == 'yes')// on entre dans la condition dans le cas ou je clique sur un lien 'oui'
    {
        $answer .= '<div class="col-md-4 offset-md-4 mx-auto text-center alert alert-info"></div>';
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<!-- Liens  -->

<!-- Liens Bootstrap -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Index</title>
</head>
<body>
    
<div class="container mx-auto text-center">
<!--------------------------------------------------------------------- Titre -------------------------------------------------------------------------->



<!-- Réponse N°1 -->
<?php
if(empty($_GET)){
    ?>
    <h1 class="display-2 text-center text-secondary alert alert-info">Aurais-je un entretien ?</h1>
    <p class="display-6 text-center text-info alert alert-secondary">Merci de répondre à la question suivante :</p>
<div class="row">
    <div class="col-md-4 offset-md-2">
        <div class="card" style=" width: 18rem;">
        
                <div class="card-body">
                    <p class="card-title text-secondary"><strong>Ma candidature vous intèresses</strong></p>
                    <a href="?answer=yes" class="btn btn-success">Oui</a>
                </div>
        </div>
    </div>
<!-- Réponse N°2 -->
    <div class="col-md-4">
        <div class="card" style="width: 18rem;">
    
                <div class="card-body">
                    <p class="card-title text-secondary"><strong>Aucun Intérêt</strong></p>
                    <a href="?answer=no" class="btn btn-danger">Non</a>
                </div>
        </div>
    </div>

<!-- Fermeture -> div class="row" -->  
</div>

<!-- Fermeture -> div class="container text-center" -->
</div>

<?php
} elseif(isset($_GET['answer']) && $_GET['answer'] == 'yes') {
?>



<!-- formulaire de contact  -->
<?php
} else{
?>

<!-- msg error -->

<?php} ?>





</body>
</html>