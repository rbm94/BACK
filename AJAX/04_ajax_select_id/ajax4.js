$(document).ready(function(){

    var prenom = $('#personne').text();
    console.log(prenom);

    var parameters = "prenom="+prenom;
    console.log(parameters);
    
    $.post("ajax4.php", parameters, function(data){
        $('#resultat').html(data.resultat);
    }, 'json');

});