<?php
class Homme 
{
    private $error;
    private $nom;
    private $prenom;
    public function setPrenom($prenom)
    {
        if(is_string($prenom))
        {
            $this->prenom = $prenom;
        }
        else
        {
            $this->error = "Ce n'est pas un string !";
            return $this->error;
        }
    }

    public function getPrenom()
    {
        return $this->prenom;
    } 

    public function setNom($nom)
    {
        if(strlen($nom) > 2 && strlen($nom) < 21)
        {
            $this->nom = $nom;
        }
        else
        {
            $this->error = "Le prenom doit contenir entre 2 et 20 carractères ! ";
           return $this->error;
        }
    }
    public function getNom()
    {
       return $this->nom; 
    }
}
$homme = new Homme;
echo'<pre>'; print_r($homme); echo '</pre>';


$homme->setPrenom("Le B");
echo "Mon prénom est " . $homme->getPrenom() . '<hr>';

// Un setteur permet de contrôler les données !
// Un getteur permet de voir les données finales <!DOCTYPE html>

// EXO: réaliser un setteur et un getteur pour la proprieté de '$nom' en controlant que le nom soit compris entre 2 et 20 charachtères !


echo $homme->setNom("Rabhi");
echo "Mon nom est " . $homme->getNom() . '<hr>';









?>

