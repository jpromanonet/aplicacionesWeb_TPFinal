<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="css/MainMenuStyle.css"> -->
    <link rel="stylesheet" href="./css/EstilosGeneral.css">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Tablero</title>
</head>
  <body>
                                          <!-------------------------------------NAV--------------------------------------------->

<?php
require ('./views/Nav.php');
?>
                                          <!---------------------------------------ARTICLE------------------------------------------->
<article class="Errores">
<div class="container">
  
  <div class="row">
    <div class="col-4">
      <img src="./img/warning.svg" width="60%" Height="60%">
    </div>
    <div class="col-4">
      <p class="error">¡Oh, no!</p>
      <p class="error">Se ha producido un error. Para continuar, vuelva atrás o acceda a otra sección</p>
    </div>
    <div class="col-4">
      <img src="./img/warning.svg" width="60%" Height="60%">
    </div>
  </div>
  <div class="row">
    <div class="col-4"></div>
    <div class="col-4">
      <img src="./img/robot.svg" width="70%" Height="70%">
    </div>
    <div class="col-4"></div>
  </div>
</div>
  </article>



</body>
                                          <!-------------------------------------BOOTSTRAP--------------------------------------------->

<?php
require('./views/Bootstrap.php')
?>
</html>
