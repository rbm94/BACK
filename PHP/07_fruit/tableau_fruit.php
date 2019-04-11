
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Tableau Fruits PHP</title>

<?php 
// 1- Déclarer un tableau ARRAY avec tout les fruits
	$tab_fruit = array('cerises', 'bananes', 'pommes', 'pêches');
	
//2- Déclarer un tableau ARRAY avec les poids suivants : 100, 500, 1000, 1500, 2000, 3000, 5000, 10000.
    $tab_poids = array(100, 500, 1000, 1500, 2000, 3000, 5000, 10000);
 
//	3- Affichez les 2 tableaux
    echo'<pre>';var_dump($tab_fruit); echo '</pre>';
    echo'<pre>';var_dump($tab_poids); echo '</pre>';


//4- Sortir le fruit "cerises" et le poids 500 en passant par vos tableaux pour les transmettres à la fonction "calcul()" et obtenir le prix.
    require_once("fonction.php");
 
    echo '<hr>' . calcul($tab_fruit[0], $tab_poids[1]) . '<hr>';

    echo'<br>' . '<br>';
    echo'<div class="col-md-6 offset-md-3 mx-auto alert alert-info text-center">';
	
//5- Sortir tout les prix pour les cerises avec tout les poids (indice: boucle).	
	foreach($tab_poids as $key => $value)
    {
        echo '<hr>' . calcul($tab_fruit[0], $value) . '<hr>';
    }
    echo'</div>';
    echo'<br>' . '<br>';
//6- Sortir tout les prix pour tout les fruits avec tout les poids (indice: boucle imbriquée).
    echo '<table class="table table-bordered text-center"><tr>';
        foreach($tab_fruit as $key1 => $value1)
        {
            foreach($tab_poids as $key => $value)
            {
                echo '<hr>' . calcul($value1, $value) . '<hr>';
            }
        }
	echo '</tr></table><hr>';
	
//7- Faire un affichage dans une table HTML pour une présentation plus sympa.

echo '<table class="table table-bordered text-center"><tr>';
echo '</tr><th>Poids</th>';  
		foreach($tab_fruit as $fruits)
		{
			echo "<th>$fruits</th>";
			
		}
		echo '</tr>';
		foreach($tab_poids as $poids)
		{
			echo '</tr>';
			echo "<th>$poids g</th>";
			
			foreach($tab_fruit as $fruits)
			{
				echo "<td>" . calcul($fruits, $poids) . "</td>";
			}
			echo '</tr>';
		}
		
echo '</table>';
?>





</head>
<body>

     
</body>
</html>



