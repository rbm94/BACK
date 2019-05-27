$(document).ready(function(){

    $('#submit').click(function(event){
        event.preventDefault();
        ajax();
    });


    function ajax()
    {
        var personne = $('#personne').val();
        console.log(personne);

        var parameters = "personne="+personne;

        $.post("ajax2.php", parameters, function(data){
            $('#resultat').html(data.resultat);
            $('#personne').val('');
        }, 'json');
    }

});