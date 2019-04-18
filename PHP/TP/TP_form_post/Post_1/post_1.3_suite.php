<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Post_1.3_suite.php</title>




</head>
<body>



<h1 class="display-4 text-secondary text-center">Formulaire de voiture </h1>

<?php 

 if($_POST){ #Ne s'affiche que si une valeur est entrée  
                echo '<div class="col-md-3 offset-md-5 alert alert-dark text-dark mx-auto text-center">';
                foreach($_POST as $key2 => $value)
                    {
                    echo "$key2 => $value<br>";
                    }
                echo'</div>';


            }
?>

</body>
</html>