<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>logement1</title>
</head>
<body>
     <h1 class="display-4 text-secondary text-center">Nouveau Logement</h1>

    <?php
    //echo '<pre>'; print_r($_POST); echo '</pre>';

    echo '<div class="col-md-4 offset-md-4 alert alert-success text-center mx-auto">';
    foreach($_POST as $key => $value)
    {
        echo "$key : $value<br>";
    }
    echo '</div>';

           
    
    ?>
</body>
</html>