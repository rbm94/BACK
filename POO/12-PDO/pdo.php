<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<?php
// Exo : réaliser le traitement PHP afin de se connecter à la BDD 'entreprise'
$pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));

echo '<pre>'; print_r($pdo);echo '</pre>';
echo '<pre>'; print_r(get_class_methods($pdo));echo '</pre>';

echo "<h2 class='display-4 text-center'>exemple n° 1 SELECT + QUERY + FETCH</h2><hr>";

$resultat = $pdo->query("ezfzefzefzefzefzef"); // errueur de requete volontaire

echo '<pre>'; print_r($pdo->errorInfo());echo '</pre>'; // en cas d'erreur de requete SQL, erroInfo() contient le message d'erreur et les codes erreurs

// Exo : afficher les données de l'employé id 415
$resultat = $pdo->query("SELECT * FROM employes WHERE id_employes = 415");
$employe = $resultat->fetch(PDO::FETCH_ASSOC);
echo '<pre>'; print_r($employe);echo '</pre>';

echo '<div class="alert alert-success col-md-4 offset-md-4 text-center text-dark">';
foreach($employe as $key => $value)
{
    echo "$key - $value<hr>";
}
echo '</div>';

echo "<h2 class='display-4 text-center'>exemple n° 2 SELECT + QUERY + FETCHALL</h2><hr>";

// Exo : afficher successivement les données de chaque employé en utilisant la méthode FETCHALL()
$resultat = $pdo->query("SELECT * FROM employes");
$employes = $resultat->fetchAll(PDO::FETCH_ASSOC);
echo '<pre>'; print_r($employes);echo '</pre>';
foreach($employes as $key => $tab)
{
    echo '<div class="alert alert-info col-md-4 offset-md-4 text-center text-dark">';
    foreach($tab as $key2 => $value)
    {
         echo "$key2 - $value<hr>";
    }
    echo '</div>';
}

echo "<h2 class='display-4 text-center'>exemple n° 3 SELECT + QUERY + FETCH_ASSOC</h2><hr>";
$resultat = $pdo->query("SELECT * FROM employes", PDO::FETCH_ASSOC); // on demande d'indexer avec le nom des champs quand c'est toujours au stade d'objet
echo '<pre>'; var_dump($resultat);echo '</pre>';

// Exo : afficher l'ensemble des employés sous forme de tableau HTML via l'objet '$resultat'
echo '<table class="table table-bordered text-center"><tr>';
for($i = 0; $i < $resultat->columnCount(); $i++)
{
    $colonne = $resultat->getColumnMeta($i);
    echo "<th>$colonne[name]</th>";
}
echo '</tr>';
// je n'ai plus besoin de la méthode fetch() pour réaliser cette boucle foreach(), nous avons associé la méthode directement avec la requete SQL, on travail avec l'objet '$resultat'
foreach($resultat as $employe)
{   
    //echo '<pre>'; print_r($employe);echo '</pre>';
    echo '<tr>'; 
    foreach($employe as $value)
    {
        echo "<td>$value</td>";
    }
    echo '</tr>';
}
echo '</table>';

echo "<h2 class='display-4 text-center'>exemple n°4  INSERT, UPDATE, DELETE</h2><hr>";

// Exo : insérez vous dans la BDD à l'aide d'une requete INSERT
$resultat = $pdo->exec("INSERT INTO employes VALUES (DEFAULT, 'Grégory', 'LACROIX', 'm', 'info', '2019-02-12', 75000)");
echo "Nombre de résultat affecté par l'INSERT : <strong>$resultat</strong><hr>";

echo "<h2 class='display-4 text-center'>exemple n°5  PREPARE + '?' + FETCH</h2><hr>";

$resultat = $pdo->prepare("SELECT * FROM employes WHERE nom = ?"); // On va dans un premier temps "préparer" la requete sans la partie variable, que l'on représentera avec marqueur sous forme de point d'interrogation

$resultat->execute(array("Gallet")); // Gallet va remplacer le point d'interrogation juste au dessus
$donnees = $resultat->fetch(PDO::FETCH_ASSOC);
echo implode($donnees, ' - '); // permet d'extraire les valeurs d'un tableau en chaine de caractère avec un séparateur

echo "<h2 class='display-4 text-center'>exemple n°6  PREPARE + ':' + FETCH</h2><hr>";

$resultat = $pdo->prepare("SELECT * FROM employes WHERE nom = :nom"); // déclaration d'un marqueur nominatif
$resultat->execute(array("nom" => "LACROIX")); // il est possible d'envoyer directement à l'execution la valeur des marqueurs nominatif

$donnees = $resultat->fetch(PDO::FETCH_ASSOC);
echo implode($donnees, ' - ');

echo "<h2 class='display-4 text-center'>exemple n°7  PREPARE + ':' + FETCH_OBJ</h2><hr>";
// Exo : selectionner à l'aide d'une requète préparée les informatiosn de l'employé 'Thoyer' et afficher ses données à l'aide de la méthode FETCH_OBJ
$resultat = $pdo->prepare("SELECT * FROM employes WHERE nom = :nom");
$resultat->execute(array("nom" => "Thoyer"));
$employe = $resultat->fetch(PDO::FETCH_OBJ); // retourne un objet issu de la classe StdClass avec chque indice comme propriété public 
echo '<pre>'; print_r($employe);echo '</pre>';

echo "Prenom : " . $employe->prenom . '<hr>';
// La boucle foreach() permet de passer en revue l'objet '$employe'
foreach($employe as $key => $value)
{
    echo "$key - $value<br>";
}
echo '<hr>';

echo "<h2 class='display-4 text-center'>exemple n°8 transaction + requete et annulation de celle ci</h2><hr>";

$pdo->beginTransaction();

$result = $pdo->exec("UPDATE employes SET salaire = 1000");
echo "Nombre d'enregistrement affecté par l'UPDATE : $result";

$resultat = $pdo->query("SELECT * FROM employes", PDO::FETCH_ASSOC);
echo "<span>Avec le changement</span>";

echo '<table class="table table-bordered text-center"><tr>';
for($i = 0; $i < $resultat->columnCount(); $i++)
{
    $colonne = $resultat->getColumnMeta($i);
    echo "<th>$colonne[name]</th>";
}
echo '</tr>';
foreach($resultat as $employe)
{   
    //echo '<pre>'; print_r($employe);echo '</pre>';
    echo '<tr>'; 
    foreach($employe as $value)
    {
        echo "<td>$value</td>";
    }
    echo '</tr>';
}
echo '</table>';

// $pdo->commit(); valide ou la transaction 

// Si on avait voulu valider la transacttion, nous aurions du pointer sur la méthode 'commit' --> $pdo->commit();

$pdo->rollBack(); // permet d'annuler la transaction et de revenir à l'état initial
// exo : refaite un affichage de la table (requete + affichage)

$resultat = $pdo->query("SELECT * FROM employes", PDO::FETCH_ASSOC);
echo "<span>On annule le changement</span>";

echo '<table class="table table-bordered text-center"><tr>';
for($i = 0; $i < $resultat->columnCount(); $i++)
{
    $colonne = $resultat->getColumnMeta($i);
    echo "<th>$colonne[name]</th>";
}
echo '</tr>';
foreach($resultat as $employe)
{   
    //echo '<pre>'; print_r($employe);echo '</pre>';
    echo '<tr>'; 
    foreach($employe as $value)
    {
        echo "<td>$value</td>";
    }
    echo '</tr>';
}
echo '</table>';

echo "<h2 class='display-4 text-center'>exemple n° 9 : FETCH_CLASS</h2><hr>";

class Employes
{
    public $id_employes;
    public $prenom;
    public $nom;
    public $sexe;
    public $service;
    public $date_embauche;
    public $salaire;
}

$result = $pdo->query("SELECT * FROM employes");
$objet = $result->fetchAll(PDO::FETCH_CLASS, "Employes"); // permet de prendre les résultats de la requete et d'affecter les propriooétés de l'objet. Chaque valeur va être ré-associé aux différentes propriététs de la classe (il faut pour cela que l'orthographe des nom des colonnes/champs SQL correspondent aux propriétés de l'objet)
echo '<pre>'; print_r($objet);echo '</pre>';

foreach($objet as $value)
{
    echo $value->prenom . '<hr>';
}

























































