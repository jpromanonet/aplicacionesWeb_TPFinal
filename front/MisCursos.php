<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="MisCursos.css">
    <link rel="stylesheet" href="css/MainMenuStyle.css"> -->
    <link rel="stylesheet" href="./css/EstilosGeneral.css">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Inscripciones</title>
</head>
  <body>
                                  <!-------------------------------------NAV--------------------------------------------->
<?php
require('./views/Nav.php');
?>

                                <!------------------------------------ASIDE-------------------------------------------->
<?php
require('./views/AsideAlumno.php');
?>

                                <!-----------------------------------ARTICLE------------------------------------------->
<article>
  <div class="container">
<hr>
            <h2>Mis cursos</h2>
            <hr>
            <br>
            <div class="container">
                <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Sede</th>
                        <th scope="col">Año</th>
                        <th scope="col">Cuatrimestre</th>
                        <th scope="col">Materia</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>CABA</td>
                        <td>1</td>
                        <td>2</td>
                        <td>Programación II</td>
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>CABA</td>
                        <td>1</td>
                        <td>2</td>
                        <td>UML</td>
                      </tr>
                    </tbody>
                  </table>
            </div>
  </div>
            
</article>
                                <!-----------------------------------BOOTSTRAP------------------------------------------->

</body>
<?php
require('./views/Bootstrap.php');
?>
</html>