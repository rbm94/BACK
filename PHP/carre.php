<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
<link rel="stylesheet" href="./carre.css">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


</head>
<body>
    <!-- Carré 2-->
    <div class="carre2"></div>
    <a href="?choix=salmon"></a>
    <!-- Carré 3-->
    <div class="carre3"></div>
    <a href="?choix="></a>
    
    <?php
    if(empty($_GET))
    {
    ?>
    <!-- Carré 1-->
        <div class="carre"></div>
        <a href="?choix=coral"></a>

    <?php
    }
    elseif(!empty($_GET["choix"]) && $_GET["choix"]=="coral"){ 
    ?>
     <!-- Carré 2-->
    <div class="carre2"></div>
    <a href="?choix=salmon"></a>
    <?php
    }elseif(!empty($_GET["choix"]) && $_GET["choix"]=="salmon"){ 
    
    ?>
    }
?>










</body>
</html>

