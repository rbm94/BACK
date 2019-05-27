
<?php
// majuscule pour les nom de class
class Panier
{
    public $nbProduits;
    public function ajouterArticle()
    {
        return "L'article a été ajouté !!";
    }
    protected function retirerArticle()
    {
        return "L'article a été retiré !!";
    }
    private function affichageArticle()
    {
        return "Voici les articles";
    }

}
$panier1 = new Panier;

echo'<pre>'; var_dump($panier1); echo '</pre>'; // on observe un objet qui est issu de la class panier a l'identifiant #1 (la référence de l'objet)


echo'<pre>'; var_dump(get_class_methods($panier1)); echo '</pre>'; // permet uniquement d'observer les méthodes public issu de la class . 

// Exo : affecter la valeur de 5 à la propriéter "$nbProduits"

$panier1->nbProduits = 5; //on affecte 5 à la propriété (variable) , pas de signe '$' quand j'appel une propriét" publique de l'objet 
echo'<pre>'; print_r($panier1); echo '</pre>';

echo "Nombre de produit dans le panier : " . $panier1->nbProduits . "<hr>";
echo "Panier 1 > " . $panier1->ajouterArticle() . "<hr>";

// echo "Panier 1 > " . $panier1->retirerArticle() . "<hr>"; /!\ erreur methode protected peux être heriter 
// echo "Panier 1 > " . $panier1->affichageArticle() . "<hr>"; /!\erreur méthode private accessible que via sa classe 

// Les niveaux de visibilité permettent de proteger des données , par exemple les données saisi d'un fromulaire ne pouuront pas être attribués à n'importe qu'elle propriété déclarée, elles passeront par des méthodes qui permettrons de controleer ces données .


$panier2 = new Panier;
echo'<pre>'; var_dump($panier2); echo '</pre>';

$panier2->nbProduits = 3;

echo "Nombre de produit dans le panier : " . $panier2->nbProduits . "<hr>";