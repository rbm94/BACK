<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <title>Formulaire de contact</title>

<?php
echo '<pre>' ; print_r($_POST); echo '</pre>';
// On vérifie si on a bien cliqué sur le bouton submit ! 
if(isset($_POST['submit'])){
    //1 er argument :
    $destinataire  = "bahaeddine.rabhi@lepoles.com";
    //2ème argument : 
    $sujet = $_POST["object"];
    //3ème argument :
    $message = $_POST['message'];


    $entetes = "MIMIE-Version 1.0 \n";

    $entetes .= "From: $_POST[email] \n";

    $entetes .= "Reply-to :bahaeddine.rabhi@lepoles.com  \n";
      
    $entetes .= "X-priority: 1\n";


    mail($destinataire,$sujet,$message, $entetes);

}
    ?>

</head>
<body>
    <!--Realiser  un formulaire de contact avec les objets suivants : objets, email, message, bouton envoyer-->
<form class="col-md-4 offset-md-4" method="POST">    
     <!--Objet-->
<form class="form-group col-md-12">
  <label class="sr-only" for="inlineFormInput">Objets</label>
  <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" name="object" placeholder="Object">


    <!-- Email -->  
<div class="form-group col-md-12 ">
   <label for="exampleInputEmail1">Email address</label>
   <input type="text" class="form-control" id="email" name="email" placeholder="Enter email">
   <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
</div>


    <!--Message-->
<form class="was-validated">
  <div class="mb-3">
    <label for="Textarea">Textarea</label>
    <textarea class="form-control" id="Textarea" name="message" placeholder="Required message" required></textarea>
    <div class="invalid-feedback">
      Please enter a message in the textarea.
    </div>
  </div>

     <!--Submit-->
 <button type="submit" class="btn btn-primary mb-2" name="submit">Send</button>
</form>
</body>
</html>