<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
<h1 class="display-4 text-center text text-danger">Formulaire Fruit</h1>
    <!-- 
    1. Réaliser un formulaire HTML permettant de selectionner un fruit (liste déroulante) et de saisir un poids (champ input)
    2. Traitement permettant d'afficher le prix en passant par la fonction déclarée 'calcul()'
    3. Faire en sorte de garder le dernier fruit selectionné et le dernier poids saisie dans le formulaire lorsque celui ci est validé 
    -->
<form class="col-md-4 offset-md-4" method="post" action="">
<div class="form-group">
<label for="fruits">Fruit</label>
<select name="fruits" id="fruits" class="form-control">
<option value="cerises"<?php if(isset($_POST['fruits'])&& $_POST['fruits'] =='cerises' ) echo 'selected'?>>Cerises</option>
<option value="bananes"<?php if(isset($_POST['fruits'])&& $_POST['fruits'] =='bananes' ) echo 'selected'?>>Bananes</option>
<option value="pommes"<?php if(isset($_POST['fruits'])&& $_POST['fruits'] =='pommes' ) echo 'selected'?>>Pommes</option>
<option value="pêches"<?php if(isset($_POST['fruits'])&& $_POST['fruits'] =='pêches' ) echo 'selected'?>>Pêches</option>
</select>
</div>
<div class="form-group">
<label for="poids">Poids</label>
<input type="text" class="form-control" id="poids" name="poids" placeholder="Entrer le poids" value="<?php if(isset($_POST['poids'])) echo $_POST['poids'] ?>">
</div>
 <button class="col-md-12 btn btn-dark" type="submit" name='submit'>Calcul</button>
<?php
require_once("fonction.php");
if(isset($_POST['fruits']))
{
    echo calcul($_POST['fruits'], $_POST['poids']) . '<hr>';
}
?>

</form>
</body>
</html>