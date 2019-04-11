<?php
require_once('include/init.php');

if(isset($_GET['action']) && $_GET['action'] == 'validate')
{
    $validate .= '<div class="col-md-6 offset-md-3 text-center alert alert-success">Félicitations !! vous êtes inscrit sur le site. Vous pouvez dès à présent vous connecter !!</div>';
}

require_once('include/header.php');
?>

<h1 class="display-4 text-center text text-success">CONNEXION</h1><hr>

<?= $validate ?>

<?php
require_once('include/footer.php');