$(document).ready(function(){
    $('#submit').click(function(event){
        event.preventDefault();
        ajax();
        // pour chaque click sur le bouton , on execute la fonction ajax()
    });


    function ajax()
    {
        var id = $('#personne').val();
        // on séléctione le selecteur id 'personne afin de récuperer les id de l'employé
        console.log(id);

        var parameters = "id="+id;
        // on définit les paramètres à envoyer la requete AJAX , qui est transmit à la requete de supp. php
        console.log(parameters);


        // post  est une methode JQUERY qui permet d'envoyer des requetes AJAX en HTTP
        // arguments:
        //  
        $.post("ajax3.php", parameters, function(data){
            $('#employes').html(data.resultat);
        }, 'json');
    }
}); 