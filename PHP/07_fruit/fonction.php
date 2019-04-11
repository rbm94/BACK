<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <title>Document</title>

<?php
function calcul($fruit,$poids)
{
    switch($fruit)
    {
        case 'cerises' : $prix_kg = 5.76; break;        
        case 'bananes' : $prix_kg = 2.50; break;        
        case 'pommes' : $prix_kg = 1.61; break;        
        case 'pêches' : $prix_kg = 3.23; break;     
    default: return "fruit inéxistant"; break;   

    }
    $resultat = round(($poids*$prix_kg/1000),2);
//round est une fonction prédéfinie qui permet d'arrondir un chiffre 

    return "Les $fruit coutent $resultat € pour $poids grammes.<br>";


}

// echo calcul('cerises', 500);
// echo calcul('bananes', 600);
// echo calcul('pêches', 300);
// echo calcul('pommes', 1000);

?>




</head>
<body>
    
</body>
</html>