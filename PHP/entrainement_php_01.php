<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Entrainement php</title>

</head>
<body>
<div class="container">
    <h2 class="display-4 text-center" > ---Ecriture & Affichage--- </h2>
    <!-- je peux écrire du HTML dans un fichier ayant l'extension PHP, l'inverse n'est pas possible  -->

<!-- ouverture de la balise PhP -->
    <?php 
   
   echo 'Bonjour';
   echo '<br>';

   echo '<hr><h2 class="display-4 text-center" >Commentaire</h2><hr>'

   ?>
   <?= 'Allo' ?> <!-- le = remplace le 'echo' -->
<!--Fermeture de ma balise   -->
<strong>SUPRISE MOTHER F**** !</strong> <!--on peu fermer ou réouvrir le HTMl quand on le souhaite-->
 <?php 
    echo 'Texte'; //Ceci est un commentaire pour écrire sur une seul ligne 
    echo 'Texte'; /*Ceci est un commentaire pour écrire sur plusieurs lignes */
    echo 'Texte'; #Ceci est un commentaire pour écrire sur une seul ligne  

    echo '<hr><h2 class="display-4 text-center" >Variables : Types / Déclaration / Afféctation </h2><hr>';

    // Définition : Une variable est un espace mémoire qui porte un nom et permettant de conserver une valeur. 
// En PHP on déclare une variable avec le signe $.
    $a = 127;
    echo gettype($a); // gettype() est une fonction prédéfinie qui indique le type d'une variable, ici il s'agit d'un integer (entier). 
    print '<br>';

    $b = 1.5;
    echo gettype($b);  # c'est un double 
    print '<br>'; 

    $c = 'une chaine de caractère';
    echo gettype($c); // affiche un string.
    echo '<br>';

    $d = '127';
    echo gettype($d); // affiche string.
    echo '<br>';

    $e = true ;
    echo gettype($e); // affiche un boolean; 
    echo '<br>';


    echo '<hr><h2 class="display-4 text-center" > --- Concaténation --- </h2><hr>';

    $x = ' Bonjour ';
    $y = 'tout le monde';
    print $x . $y . '<br>'; // le point de concaténation peut être traduit par 'suivi de'


    echo "$x $y <br>"; 
    echo  'Aujourd\'hui <br>'; //Pour bien dire que c'est un apostrophe
    echo "Aujourdh'hui <br>";

    echo 'Aujourd\'hui <br>'; //Dans l'instruction echo, on peut séparer les élément affiché par une virgule. Cette syntaxe est spécifique au echo et ne marche pas avec print.


    echo '<hr><h2 class="display-4 text-center" > --- Concaténation, lors de l\'affectation --- </h2><hr>';

    $prenom1 = 'Bruno';
    $prenom1 = 'Claire';
    echo $prenom1 . '<br>'; // Affiche Claire et écrase Bruno 

    $prenom2 = 'Nicolas';
    $prenom2 = 'Marie'; // .= opérateur combiné, il prend la valeur précédente pour y ajouter une seconde valeur.
    echo $prenom2 . '<br>'; // Affiche "Nicolas Marie" grâce à l'opérateur combiné. La valeur "Marie" vient se concaténé à la valeur "Nicola "sans la remplacer.

    echo '<hr><h2 class="display-4 text-center" > --- Constante et constante magique  ---  </h2><hr>';
    # Une constante tout comme les variables permet de créer une valeur comme son nom l'indique, la valeur est constante ! 
    # Oon ne peut pas changer sa valeur durant l'execution du script
    define("CAPITALE","Paris");

    echo CAPITALE . '<br>'; # pas possible de déclarer une constante déjas définie

    echo __FILE__ . '<br>';
    echo __LINE__ . '<br>';



    $v = '<span class="text-success">vert</span>' ;
    $j = '<span class="text-warning">-jaune</span>' ;
    $r = '<span style= "color:red" >-rouge</span>' ;


    print "$v  $j  $r<br>";

    echo $v;
    echo $j;
    echo $r;

echo '<hr><h2 class="display-4 text-center" > --- Opérateur arithmétique  ---  </h2><hr>';
 $a = 10; $b = 2;

    echo $a + $b . '<br>'; # addition 
    echo $a - $b . '<br>'; # soustraction 
    echo $a * $b . '<br>'; # multiplication 
    echo $a / $b . '<br><hr>'; # division

    // opération / affectation
    $a += $b; //reviens à $a = $a + $b 
    echo $a . '<br>'; 
    $a -= $b; //reviens à $a = $a + $b
    echo $a . '<br>';
    $a *= $b; //reviens à $a = $a + $b 
    echo $a . '<br>';
    $a /= $b; //reviens à $a = $a + $b 
    echo $a . '<br>';

echo '<hr><h2 class="display-4 text-center" > --- Opérateur de comparaison  ---  </h2><hr>';
                            #---Isset --&-- Empty---#
$var1 = 0;
$var2 = '';

if(empty($var1)){
    echo "0, vide ou non définie<br>";
}

if(isset($var2)){
    echo "var2 existe et est definie par rien<br>"; #isset test l'existence d'une ou plusieurs variable 
}

$a = 10; $b = 5; $c = 2;
if($a > $b){
    print 'A est supèrieur à B<br>';
}
else{
    echo 'B est supèrieur à A<br>';
}

if($a > $b && $b > $c){
     print 'OK pour les 2 conditions<br>';
}

elseif($a == 9 || $b > $c){
     print 'OK pour au moin 2 conditions<br>';
}

else{
    echo 'FAUX';
}

//ELSEIF permet d'ajouter des cas supplémentaire à la condition IF 
# Il peut y avoir plusieurs ELSIF dans la même condition 
// Si une des conditions supèrieures vérifiee, ELSEIF bloque le script et toutes les condition suivante ne seront pas évaluées

# Condition exclusive 
if($a == 10 XOR $b == 6){
     print 'Condition exclusive<br>';
}
//Pour rentrer dans les acolades, il faut que seulement une des 2 conditions soient vérifiées
 print ($a == 10) ? "A est égal à 10 <br>" : "A n'est pas égal à 10" ;
//Condition ternaire : le '?' remplace le IF et les 2 points ':' remplace le ELSE

                                    #COMPARAISON#
$varA = 1;
$varB = '1';
if($varA == $varB){
    echo 'Même finalité<br>';
}
//En présence du triple égale "===", le test ne fonctionne pas car les types des variables INTEGER et STRING  sont différent donc pas égal.

/* 
= Affectation 
== Comparaison de la valeur
=== Comparaison de la valeur et du type 
*/

echo '<hr><h2 class="display-4 text-center" > --- Opérateur SWITCH ---  </h2><hr>';

$perso ="Le B";
switch($perso){
    case 'luigi':
    echo "Vous avez choisie $perso<br>";
    break;

    case 'Yoshi':
    echo "Vous avez choisie $perso<br>";
    break;

    case 'Browser':
    echo "Vous avez choisie $perso<br>";
    break;
    default: 
    echo " Vous êtes fou !! c'est Le B le meilleur<br>";
    break;
}

#Si on une grande comparaison de cas SWITCH est à PRIVILEGIER . 
// 'CASE' représente les cas dans lesquel nous pouvons potentiellement tomber .  
// 'BREAK' permet de stopr le script nous tombions dans ces cas .  

//Exo : faite la même chose que le SWITCH avec des condition IF/ELSEIF/ELSE ?
if($perso == 'luigi'){
    echo "Vous avez choisie $perso<br>";
} 
elseif($perso == 'toad'){
   echo "Vous avez choisie $perso<br>";
}
elseif($perso == 'Browser'){
   echo "Vous avez choisie $perso<br>";
}
else{
    echo  " Vous êtes fou !! c'est Le B le meilleur<br>";
}

echo '<hr><h2 class="display-4 text-center" > --- Fonctions prédéfinies ---  </h2><hr>';
//
// Une fonction Prédefinie permet de réaliser un traitement spécifique 

echo 'Date : ' . date("d/m/Y") . '<br>';

//Lorsque l'on utilise une fonction prédéfinie, il faut toujour se poser la question, à savoir ce qu'on doit lui envoyer comme arguments et surtout savoir ce qu'elle retourne ! 
//Les arguments de la fonction date() ne sortent pas de nul part, on les retrouves dans la documentation 

echo '<hr><h2 class="display-4 text-center" > --- Traîtement des chaines ---  </h2><hr>';

$email = "bahaeddine.rabhi@lepoles.com";

echo strpos($email, "@");

#strpos() : string / fonction prédéfinie qui permet de trouver la position d'un caractère dans une chaine d'argument :

#1- La chaine dans laquelle on veut cherhcer 

#2- le caractère a trouver entre guillement 

$email2 = "Bonjour!";
echo strpos($email2, "@");
var_dump(strpos($email2, "@"));// Affichage amélioré

$phrase = "J'fumes un missile , j'veux pas pércer! Pour ma part j'voudrais un musée , qui retrasse ma vie depuis l'berceau ";
echo iconv_strlen($phrase) . '<br>';

//iconv_strlen() est  une fonction qui compte la taille de la chaine de caractères 
// on peut les utiliser pour les MdP qui n'ont pas des tailles conformes

$text = "什么是Lorem Ipsum?
Lorem Ipsum，也称乱数假文或者哑元文本， 是印刷及排版领域所常用的虚拟文字。由于曾经一台匿名的打印机刻意打乱了一盒印刷字体从而造出一本字体样品书，Lorem Ipsum从西元15世纪起就被作为此领域的标准文本使用。它不仅延续了五个世纪，还通过了电子排版的挑战，其雏形却依然保存至今。在1960年代，”Leatraset”公司发布了印刷着Lorem Ipsum段落的纸张，从而广泛普及了它的使用。最近，计算机桌面出版软件”Aldus PageMaker”也通过同样的方式使Lorem Ipsum落入大众的视野。

我们为何用它？
无可否认，当读者在浏览一个页面的排版时，难免会被可阅读的内容所分散注意力。Lorem Ipsum的目的就是为了保持字母多多少少标准及平均的分配，而不是“此处有文本，此处有文本”，从而让内容更像可读的英语。如今，很多桌面排版软件以及网页编辑用Lorem Ipsum作为默认的示范文本，搜一搜“Lorem Ipsum”就能找到这些网站的雏形。这些年来Lorem Ipsum演变出了各式各样的版本，有些出于偶然，有些则是故意的（刻意的幽默之类的）。";

echo substr($text, 0,150) . "<a href = ''>Lire La Suite...</a>";
/*
substr est  une fonction  prédéfinie qui permet de définir l'affichage du début et de la fin d'un article par exemple 
*/

echo '<hr><h2 class="display-4 text-center" > --- Fonctions utilisateur ---  </h2><hr>';

function separation(){
    echo "<hr><hr><hr><hr><hr>";
}
separation();


//fonction avec argument 

function oeoe($qui){
    return "OE,OE !! $qui <br>";
}
echo oeoe('Le B !!');

$blaze = 'Bakhaw !!';
echo oeoe($blaze);

function applique($nombre){
    return $nombre*1.2;
}

echo applique(500) . '€<br>';


//Exo : 

function appliquet($nombres){
    return $nombres*1.19;
}

echo appliquet(500) . '€<br>';


function appliquetv($nombres){
    return $nombres*1.05;
}

echo appliquetv(500) . '€<br>';

function appliquetva($nombres){
    return $nombres*1.07;
}

echo appliquetva(500) . '€<br>';
//--------------------------------------------------------------------------------------------------------------------------------------------------------
echo exometeo("été", 33);
function exometeo($saison, $temperature){
    
    if($temperature >1 || $temperature <-1)
    $degre = "degrés";
    else
    $degre = "degré";

    if
($saison == 'printemps')
    $art = 'au';
    else
    $art = 'en';


 return " Nous somme $art $saison et il fait $temperature $degre <br>";
}
echo exometeo('été', 27);
echo exometeo('automne', 0);
echo exometeo('hiver', -1);
echo exometeo( 'printemps', 16);

//ESPACE GLOBALE & LOCAL
function jourSemaine(){

    $jour = 'jeudi';
    return $jour;
    echo 'Allo !!';
}

    echo $jour;

    $recup = jourSemaine();
    echo $recup . '<br>';
//-------------------------------------------------------------------------------------------------------------------------------------------------------



$pays = 'France';
function afficherPays(){

    global $pays;// global permet d'importer une variable déclarée a l'éxtèrieur de la fonction . en l'occurence la variable 'pays'
    return $pays;
}
echo afficherPays();

echo '<hr><h2 class="display-4 text-center" > --- Structure Itérative/Boucle ---  </h2><hr>';

// Boucle WHILE 
$i = 0;
while($i < 5){
    if($i == 4)
     echo $i;
    else
    echo "$i---";
    $i++; // equivaut à $i = $i + 1  
    
}
//Exo: Afficher un selecteur de 30 options via une boucle While 
echo '<select>';
for($e = 0; $e < 31; $e++){
    echo "<option>$e</option>";
}
echo '</select><hr>';
//Exo: Faite une boucle qui affiche de 0 à 9 sur la meme ligne 

for($d = 0; $d<10; $d++){
    echo "$d";
}


echo '<table class="table table-bordered text-center"<tr>';
for($v = 0; $v < 10; $v++)
{
    echo "<td>$v </td>"; // on créer une option par tour de boucle 
}


$compteur = 0;
// $compteur permet d'avoir une variable qui ne se réinitialise jamais a zéro, la variable augmente de +1 a chaque tour.
//La première boucle FOR tourne 10 fois pour les 10 lignes 
// La deuxieme boucle FOR tourne 10 fois chaque ligne et créer une cellule
        echo '<table class="table table-bordered text-center"><tr>';
        // 
            for($ligne = 0; $ligne < 10; $ligne++)
            {
                echo '<tr>';
        
                for($cellule = 0; $cellule < 10; $cellule++)
                {
                    echo "<td>$compteur</td>";
                    $compteur++;
                }
                echo '</tr>';
            }
        echo '</table>';

echo '<hr><h2 class="display-4 text-center" > --- Tableau de données ARAY ---  </h2><hr>';

//Un tableau ARAY est déclaré un peu comme nune variable améliorée, car on ne concerve pas qu'une valeur mais un ensemble de valeur 

$liste = array("Le B", "Aziz", "Sylvain", "Yanis");
echo $liste; // ne peut pas afficher un tableau array en passant simplement par echo 

echo '<pre>' ; var_dump($liste); echo '</pre>';
echo '<pre>' ; print_r($liste); echo '</pre>';


/*
<pre> est une balise qui permet de formater la sortie print_r ou var_dump 

Cest instructions d'affichages améliorés permettent de consulter et d'afficher les données d'un tableau, d'une variable, d'un objet ect...
*/

#Exo: afficher "aziz" en passant par array.

echo $liste[1] . '<br>'; // on va crocheter à l'indice 1 du tableau ARRAY pour extraire Aziz

echo '<hr><h2 class="display-4 text-center" > --- Boucle ForEach tableau de donnée ARRAY ---  </h2><hr>';

$tab[] = "France"; // les crochets vides permettent de générer les indices numérique;

$tab[] = "Angleterre ";
$tab[] = "Espagne";
$tab[] = "Italie";
$tab[] = "Portugal";
// echo $tab; /!\ erreur  !!

echo '<pre>'; print_r($tab); echo '</pre>';

echo '<pre>' ; var_dump($tab); echo '</pre>';

// Boucle ForEach :

foreach($tab as $value)// "as" fait partie du langage et est obligatoire 
{
    echo "$value<br>"; //affichage suuccésif grace au "<br>" 
}

echo '<hr>';
//-------------------------------------------------------------------------------------------------------------------------------------------------------
// ForEach : indices et valeurs :
foreach($tab as $key => $value){
    echo "$key => $value<br>";
}
?>

<hr> 

<?php foreach($tab as $key => $value): ?>

        <?php $key; ?> => <?= $value ?> <br> 

<?php endforeach; ?>

<?php 
$perso = array("b" => "Le b", "l" => "Luigi", "z" => "Zazi", "n" => "nassim");

echo '<hr><pre>';print_r($perso); echo '</pre>';

echo " Taille du tableau : " . count($perso) . '<br>';
echo " Taille du tableau : " . sizeof($perso) . '<br>';
// size of et count nous donne la taille d'un tableau array , le nombres d'éléments a l'intèrieur. Pas de diffèrence entre les deux .



echo implode(" - ", $perso) . '<br>';

echo '<hr><h2 class="display-4 text-center" > --- Tableau ARRAY multidimensionnel ---  </h2><hr>';
// un tableau dans un autre 

$tab_multi = array(
    0 => array("nom" => "Macron", "salaire" => 1),
    1 => array("nom" => "Le b", "salaire" => 15000),

);

echo '<pre>' ; print_r($tab_multi); echo '</pre>';


//Exo : en passant par le tab multidimensionnel 
 
// echo $tab_multi[0] . '<br>';
// echo '<pre>'; print_r($tab_multi[0]); echo '</pre>';
echo $tab_multi[0]['nom'] . '<hr>';

//Exo : afficher l'enssemble du tableau multidimensionnel à l'aide de "foreach"

foreach($tab_multi as $key => $tab)
        {
            echo '<div class="col-md-3 offset-md-5 alert alert-success text-dark mx-auto text-center">';
            foreach($tab as $key2 => $value)
            {
                echo "$key2 => $value<br>";
            }
            echo'</div>';
        }


//----------------------------------------------------------------
        // La boucle for permet de tourner autant de fois qu'il y a de lignes dans le tableau multi, donc 2 tour de boucle dans notre cas
for($i = 0; $i < count($tab_multi); $i++)
        {
            echo '<div class="col-md-2 offset-md-6 alert alert-info text-dark mx-auto text-center">';
            // on se sert de la variable $i de la boucle for pour aller crocheter à chaque indice du tableau multi et parcourir les données
    foreach($tab_multi[$i] as $key => $value)
            {
                echo "$key => $value<br>";
            }
            echo '</div>';
        }




//Les superglobales sont des variables de type array, elle sont accecible partout, à la fois dans l'espace globale & local, ele permet de véhiculer les données.

/*
$_SERVER: Véhicule les données lié au serveur 
$_GET:Véhicule les données transmit dans l'URL
$_POST:Véhicule les données d'un formulaire 
$_FILES:Véhicule les données d'un fichier umploader
$_COOKIE:Véhicule les données d'un fichier cookie
$_SESSION:Véhicule les données d'une session en cour  

TJR appelées avec "$_"et en majuscule 

*/ 

echo '<pre>' ; print_r($_SERVER); echo '</pre>';




echo '<hr><h2 class="display-4 text-center" > --- Classe et objet ---  </h2><hr>';

//Un objet est un autre type de données. Un peu à la manière d'un ARRAY , il permet de regrouper des info.
//On peut y déclarer une variable (appelée : attribut ou propriété) mais aussi des fonctions (appelée : method).

//Par convention la premiere lettre du nom de la classe doit toujours être en majuscule .
class Etudiant //une classe est comme un plan de constructions qui regroupe les données
{
    public $prenom = 'Le B'; //élement visble de partout (public)
    public $age= 21;
    public function pays()
    {
        return 'France';
    }
}

$objet = new Etudiant;
echo '<pre>' ; var_dump($objet); echo '</pre>';
echo '<pre>' ; var_dump(get_class_methods($objet)); echo '</pre>'; // permet d'afficher toute les méthods
echo "je m'appel " . $objet->$prenom . '<hr>';
echo "j'habite en " . $objet->pays() . '<hr>';
echo "j'ai " . $objet->$age . "ans" . '<hr>';


?>
</div>
</body>
</html>