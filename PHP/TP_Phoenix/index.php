<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
<!-- Liens: Bootstrap / Fontawesome / style.css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<link rel="stylesheet" href="WS_phoenix-php/css/index.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

</head>
<body>

<div class="container-fluid">

<div class="col">
      <nav class="nav">
          
          <li class="nav-item">
              <a class="nav-link active  text-center text-dark" href="#">  <i class="fab fa-phoenix-framework "> </i><strong>Phoenix</strong></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-center text-secondary" href="#">Choisir une destination</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-center text-secondary" href="#">Payer</a>
            </li>
        </nav>       
  </div>

      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="./WS_phoenix-php/img/caraibes1.jpg"   class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="./WS_phoenix-php/img/maldives_fino.jpg"  class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="./WS_phoenix-php/img/maurice_albion.jpg"class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
  </div>
<hr>
<button type="button" class="offset-md-3 col-md-6 text-info border-info btn btn-light">Choisir mon séjour !</button>
  <hr>
  
</div>




</body>
</html>
