<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- link rel="stylesheet" href="css/MainMenuStyle.css"> -->
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

                                    <!------------------------------------ASIDE-------------------------------------------->

<?php
require ('./views/AsideAlumno.php');
?>

                              <!-----------------------------------------ARTICLE----------------------------------------------->

<article class="MainMenu">
    <div class="card" id="User">
            <div class="card-body">
              <div class="LogoUsuario">
                <img src="./img/user.svg" width="100px" height="100px"> <p>Alumno UNLZ</p>
              </div>
              <div class="botonPersonalizar">
                <button type="button" class="btn btn-secondary">Personalizar esta página</button>
              </div>             
            </div>
          </div>
          <br>
          <div class="CardInferior" id="User" id="CardInferior">
            <div class="card-body">
              <div class="g">
                <p class="bienvenido">Bienvenid@ a la plataforma de gestión de la Universidad Nacional de Lomas de Zamora</p>
                <p>Desde éste lugar usted podrá gestionar todas sus inquietudes, asi como también realizar las inscripciones a Finales de las materias cursadas correspondientes al ciclo lectivo.</p>
                <p class="Exitos">Éxitos y ¡A estudiar!</p>
                <img class="libro" src="./img/bookAnimation.svg" alt="book" width="100px" height="100px">
                <img class="escribir" src="./img/writing.svg" alt="writing" width="80px" height="80px" id="pen">
              </div>           
            </div>
  </div>
          
</article>
</body>
                              <!---------------------------------------------BOOTSTRAP--------------------------------------------------->
<?php
require ('./views/Bootstrap.php');
?>
</html>