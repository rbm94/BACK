<?php
header("Location: URL");



if(isset($_POST['nbr1']) == NULL)
{
    exit("Nombre 1 non rentré");
}
if(isset($_POST['signe']) == NULL)
{
    exit("Signe non complété");
}
if(isset($_POST['nbr2']) == NULL)
{
    exit("Nombre 2 non rentré");
}

if($_POST['signe'] != "+" || $_POST['signe'] != "-" || $_POST['signe'] != "*" || $_POST['signe'] != "/" )
{
    exit("Le signe est incorrect");
}

$resultat = $_POST['nbr1'] + $_POST['nbr2'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
<form method="post" action="form.php">
Sélectionnez un nombre: <input type="text" name="nbr1" />1<br />
Sélectionnez le signe (+, -, /, *) : <input type="text" name="signe" /><br />
Sélectionnez le deuxième nombre: <input type="text" name="nbr2" /><br />
<br />
<input type="submit" value="Faire le calcul" />
</form>

</body>
</html>