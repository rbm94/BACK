<?php
class Etudiant
{
    private $prenom;
    public function __construct($arg)
    {
        echo "Instantation, nous avaons reçus l'info suivante $arg<br>";

        return $this->setPrenom($arg);
    }
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
}


$etudiant = new Etudiant;
$etudiant->setPrenom("Le B");
echo "Mon prénom est " . $etudiant->getPrenom() . '<hr>';

/*
- __construct()est une méthodemagique qui s'execute automatiquement lorsque l'on instancie la class. Elle sera l'&quiivalent du init.php avec session_start(), connexion à la BDD
- new Etudiant(Le B) -> A l'instanciation de la class,  'Le B' va automatiquement ce stocker dans ($arg)

setteur:
getteur: 
*/
?>
