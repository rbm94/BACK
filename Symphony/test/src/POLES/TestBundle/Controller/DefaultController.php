<?php

namespace POLES\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
     /**
     * @Route("/", name="accueil")
    */
        public function indexAction(){
            return $this -> render("@POLESTest/Default/index.html.twig");
        }

    /** 
     * @Route("/bonjour/")
     * localhost:8000/bonjour
     * www.maboutique.com/bonjour
     */
    public function bonjourAction(){
        echo 'bonjour';
    }
    //test : localhost:8000/bonjour

    /** 
     * @Route("/bonjour2/")
     * localhost:8000/bonjour
     * www.maboutique.com/bonjour
     */
    public function bonjour2Action(){
        return new Response('bonjour');
    
    }
    /**
     * @Route("/hola/{prenom}/")
     * 
    */
    public function holaAction($prenom){
        $params = array(
            'prenom' => $prenom
        );
        return $this -> render('@POLESTest/Default/hola.html.twig', $params);
    }

    /** 
     *  @Route ("/ciao/{prenom}/{age}/")
     * 
    */
    public function ciaoAction($prenom, $age){
        return $this-> render('@POLESTest/Default/ciao.html.twig', array(
            'prenom' => $prenom,
            'age' => $age
        ));
    }

    /** 
     *  @Route("/redirect/")
     * 
    */
    public function redirectAction(){
        $route  = $this -> get('router') -> generate('accueil');
        // $route  = $this -> getRouter() pareil que au dessus 
        return new RedirectResponse($route);
    }
    
    
    /** 
     *  @Route("/redirect2/")
     * 
    */
    public function redirect2Action(){
    return $this -> redirectToRoute('accueil');
     
    }
     /** 
     *  @Route("/message/")
     * 
    */
    public function messageAction(Request $request)
    {
        $session = $request -> getSession();

        $session -> getFlashbag() -> add('success', 'Félicitation');
        $session -> getFlashbag() -> add('error', 'Désolé mais votre solde est insufisant');

        return $this -> redirectToRoute('accueil');

    }

}


