<?php
//---- Fonction membre ----//

function clientConnecte() //cette fonction indique si le mebre est connecté
{
    if(!isset($_SESSION['membre']))//si l'indice 'membre' n'est pas définit dans la session , le membre n'est pas connecté.
    {
        return false;
    }
    else // si l'indice membre figure dans la session, le membre c'est connecté.
    {
        return true; 
    }
}


//---- Fonction membre ----//

function clientConnecteAdmin()
{
    if(clientConnecte() && $_SESSION['membre']['statut'] == 1)//si la session membre est définit et que le statut est a 1, c'est lui L'ADMIN    
    {
        return true;
    }
    else 
    {
        return false; 
    }
}