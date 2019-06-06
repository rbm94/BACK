<?php
// le fichier controller.php contient toute les actions et les méthodes a executées. Par exemple si je souhaite afficher des informations 10 par 10, c'est dans ce fichier que l'on fera ce traitement 
namespace Controller;

class Controller
{
    private $db;
    public function __construct()
    {
        $this->db = new \Model\EntityRepository; // permet de récupérer une connexion à la BDD qui se trouve dans le fichier EntityRepository.php
    }
    public function handlerRequest()
    {
        $op = isset($_GET['op']) ? $_GET['op'] : NULL; // si 'op' est définit dans l'URL, on le stock dans une variable sinon on stock 'NULL'

        try
        {
            if($op == 'add' || $op == 'update') $this->save($op); // si on ajoute ou modifie un employé, on appal la méthode save()
            elseif($op == 'select') $this->select(); // si on selectionne 1 employé, on fait appel à la méthode select()
            elseif($op == 'delete') $this->delete(); // si on supprime un employé, on fait appel à la méthode delete()
            else $this->selectAll(); // permet d'afficher l'ensemble des employés
        }
        catch(Exception $e)
        {
            die("Problème dans l'action de l'internaute !!!");
        }
    }

    public function delete()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : NULL; // on contrôle qu'un id a bien été passé dans l'URL et on le stock
        $r = $this->db->delete($id); // on fait appel à la méthode delete() du fichier EntityRepository.php
        $this->redirect('index.php'); // après la suppression, on redirige vers la page index.php
    }

    public function select()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : NULL ; 
    $this->render('layout.php','details.php', array(
        "title" => "Détails de l'meployé ID : $id" ,
        "données" => $this->db->select($id)
    ));
    }

    public function selectAll()
    {
        // echo 'Méthode selectAll !!';
        // $r = $this->db->selectAll();
        // echo '<pre>'; print_r($r); echo '</pre>';
        // db --> représente un objet issu de la classe EntityRepository
        // db->selectAll() : on pointe sur la méthode selectAll() déclarée dans la classe EntityRepository 
        $this->render('layout.php', 'donnees.php', array(
            'title' => 'Toute les données',
            'donnees' => $this->db->selectAll(), // on pointe sur la méthode déclarée dans EntityRepository.php
            'fields' => $this->db->getFields(),
            'id' => 'id' . ucfirst($this->db->table) // affiche idEmploye, cela serviran à pointé sur l'indice idEmploye du tableau de données envoyer dans le layout pour les liens voir/modifier/supprimer
        ));
    }
    
    public function save($op)
    {
        $title = $op; // permet de récupérer la donnée envoyé dans l'URL et de la stocké dans $title

        if($_POST)
        {
            $r = $this->db->save(); // lorsque l'on valide le formulaire d'ajout, on    execute le méthode savec() du fichier EntityRepository.php
        }
        $this->render('layout.php', 'donnees-form.php', array(
            "title" => "Donnée : $title",
            "op" => $op,
            "fields" => $this->db->getFields()
        ));

    }

    public function render($layout, $template, $parameters = array())
    {
        extract($parameters); // permet d'avoir les indices du tableau comme variable
        ob_start(); // commence la temporisation

        require "view/$template";
        // $content = require "view/$template";
        
        $content = ob_get_clean(); // tout se qui se trouve dans la template sera stocké dans $content grace à la fonction ob_get_clean()

        ob_start(); // temporise la sortie de l'affichage
        require "view/$layout";

        return ob_end_flush(); // permet de libérer l'affichage et fait tout apparaitre sur la page
    }
}



