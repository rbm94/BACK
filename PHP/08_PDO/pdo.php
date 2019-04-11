<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    
    <title>Requêtes PDO</title>



</head>
<body>
    
<div class="container">
<h2 class="display-4 text-center">01. PDO : Connexion</h2>
</div>
<?php

// class PDO
// {
//     méthodes (fonctions)
//     propriétés (variables)
// } 
$pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES utf8' ));
// PDO est une classe prédefine en php qui permet de se connecter à une BDD . Cette classe pocède ses propres méthodes/ function qui nous permetrons de formuler ou d'executer une requête SQL !
//$PDO est l'objet qui permet d'intèragir, et intéroger la BDD
/*
Arguments : 1 (serveur + BDD) / 2 (id) / 3 (mdp) / 4 option PDO
*/

echo '<pre>' ; var_dump($pdo); echo '</pre>';
echo '<pre>' ; print_r(get_class_methods($pdo)); echo '</pre>';

echo '<hr><h2 class="display-4 text-center">02. PDO : EXEC - INSERT / UPDATE / DELETE</h2></hr>';

//EXO : Formuler la requête permettant de m'insérer dans la BDD entreprise dans la table employer 
// $resultat = $pdo->exec("INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUE ('Bahaeddine', 'Rabhi', 'm', 'Directeur_national', '2019-04-09', 150000)");
echo "Nombre d'enregistrement affecté(s) par l'INSERT : 
$resultat <br>";
echo "Dernier ID géneré : " . $pdo->lastInsertId() . '<hr>';
 /*
    EXEC() est une méthode issue de la classe prédéfinie PDO, elle permet de formuler et executer des requêtes SQL, c'est  arguments que l'on envoie la requête complète . 
    EXEC() est prévuis pour des requêtes ne retournant pas de je de résultats 
 */ 
    echo '<hr><h2 class="display-4 text-center">03. PDO : SELECT + FETCH_ASSOC  </h2></hr>';
// Requête selection -> query() -> retour objet PDOStatement 
//Pour exploiter la selection -> associer une méthode -> fetch() / fetchAll() --> retourne au tableau ARRAY
//Si il y à plusieurs résultat fair une boucle 
        $result = $pdo->query("SELECT * FROM employes WHERE id_employes = 415");

        echo '<pre>' ; var_dump($result); echo '</pre>';
        echo '<pre>' ; var_dump(get_class_methods($result)); echo '</pre>'; 

// UPDATE 
//EXO : réaliser le traitement permettant de modifier le salaire  de l'employé n°350 par 1200
$resultat = $pdo->exec("UPDATE employes SET salaire = 1200 WHERE id_employes = 350");
echo "Nombre d'enregistrement affecté par l'UPDATE : $resultat <br>";

$resultat = $pdo->exec("DELETE FROM employes WHERE id_employes = 350");
echo "Nombre de suppression affecté par le DELETE  : $resultat <br>";


echo '<hr><h2 class="display-4 text-center">04. PDO : QUERY + SELECT + WHILE </h2></hr>';
//La boucle xhile permet de dire : tant qu'il y a des employes, on boucle !
//$employes receptionne un tableau array d'un employé par tour de boucle 
//PDO::FETCH_ASSOC --> le "::" permettent de faire appel à une constante de la classe PDO sans devoir l'instancier
$resultat = $pdo->query("SELECT * FROM employes");
while($employes = $resultat->fetch(PDO::FETCH_ASSOC))
{
    echo '<div class="col-md-4 offset-md-4 alert alert-info text-center text-dark">'; 
 
        echo $employes['prenom'] . '<hr>';
        echo $employes['service'] . '<hr>';
        echo $employes['salaire'];
    
    echo '</div>';

echo '<hr><h2 class="display-4 text-center">05. PDO : QUERY + SELECT + WHILE </h2></hr>';

    $resultat = $pdo->query("SELECT * FROM employes");
    $donnees = $resultat->fetchAll(PDO::FETCH_ASSOC);
      //echo '<pre>' ; print_r($donnees); echo '</pre>';

      foreach($donnees as $key => $tab)
      {
        echo '<div class="col-md-4 offset-md-4 alert alert-info text-center text-danger">';
        foreach($tab as $key2 => $value)
        {
            echo "$key2 : $value <hr>";
        }
        echo '</div>';
      }

echo '<hr><h2 class="display-4 text-center">06. PDO : QUERY + FETCH + BDD </h2></hr>';

//EXO : afficher la liste des bdd, puis les mettres dans une liste ul li 

    $resultats = $pdo->query("SHOW DATABASES");
    echo '<pre>' ; print_r($resultats); echo '</pre>';

   echo '<ul class="col-md-4 offset-md-4 mx-auto list-group text-center">';
   while($bdd = $resultats->fetch(PDO::FETCH_ASSOC))
   {
   echo '<li class="list-group-item">' . $bdd['Database'] . '</li>';
   }
   echo '</ul>';

   echo '<hr><h2 class="display-4 text-center">07. PDO : QUERY + TABLE </h2></hr>';

    $data = $pdo->query("SELECT * FROM employes");
     echo '<table class="table table-bordered text-center"><tr>';
    for($i = 0; $i < $data->columnCount(); $i++)
    {
        $colonne = $data->getColumnMeta($i);
        // echo '<pre>'; print_r($colonne); echo '</pre>';
        echo "<th>$colonne[name]</th>";
    }
   
   echo '</tr>';
   while($employes = $data->fetch(PDO::FETCH_ASSOC))
   {
     echo '<pre>'; print_r($employes); echo '</pre>';   
     echo '<tr>';  
    foreach($employes as $value)
    {
         echo "<td>$value</td>";
    }
    echo '</tr>';
    }
     echo '</table>';

    }// FIN while($employes = $data->fetch(PDO::FETCH_ASSOC))


    // Exo : faire la meme chose avec fetchAll()

    $datas = $pdo->query("SELECT * FROM employes");
    $employes = $datas->fetchAll(PDO::FETCH_ASSOC);

echo '<pre>'; print_r($employes); echo '</pre>';   

          echo '<table class="table table-bordered text-center"><tr>';
          foreach($employes[0] as $key => $value)
            {
                 echo "<th>$key</th>";
            }
  echo '</tr>';
         foreach($employes as $tab)
        {
          echo '</tr>';
            foreach($tab as $infos)
            {
                echo "<td>$infos</td>";
            }
        }
            echo '</tr>';
echo '</table>';



   echo '<hr><h2 class="display-4 text-center">07. PDO : PREPARE + BINDVALUE + EXECUTES </h2></hr>';
//les requêtes préparées permettent de formuler une seul fois fois la requetes et de l'executer autant de fois sougaité 
//les requêtes préparées permettes de parer aux injection sql , elle protèges les requêtes SQL .
// 3 cycles : analyse / interprétation / execution  


   $resultat = $pdo->prepare("SELECT * FROM employes WHERE nom = :nom");
// on prépare la requêtes mais elle n'est pas executable
// ':nom' marqueur nominatif comparable a une boîtes vide 

echo '<pre>'; print_r($resultat); echo '</pre>';
   $resultat->bindValue(':nom', 'Le B', PDO::PARAM_STR);

   $resultat->execute(); //PDOStatement / permet d'executer la requête préparé 

        echo '<pre>'; print_r($resultat); echo '</pre>';

  $employes = $resultat->fetch(PDO::FETCH_ASSOC);
         echo '<pre>'; print_r($employes); echo '</pre>';

       echo '<div class="col-md-6 offset-md-3 alert alert-info text-center">';
       foreach($employes as $key)
       {
           echo "$key : $value<hr>";
       }
       echo '</div>';


?>



</body>
</html>