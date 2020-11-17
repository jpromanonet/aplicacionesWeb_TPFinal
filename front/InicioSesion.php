<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/EstiloInicioSesion.css">
    <link rel="shortcut icon" type="image/x-icon" href="http://127.0.0.1:5500/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <title>Facultad de Ingenieria UNLZ</title>
</head> 
<body>
<nav class="fixed-top navbar navbar-dark bg-primary" id="navBar">
    <a class="navbar-brand nav">
      <img src="./img/logo.png" alt="logo" height="50px" width="190px">
    </a>
    <form class="form-inline">
      <div class="btn-group" role="group">
        <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="./img/world.svg" alt="mundito" width="30px" height="30px">
        </button>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#">English (en)</a>
          <a class="dropdown-item" href="#">Español - Mexico (es_mex)</a>
        </div>
      </div>
    </form>
</nav>
<div class="campus">
  <h1>UNLZ Ingenieria</h1><br>
  <h2>Campus virtual</h2>
</div>
<div class="Formulario">
  <form>
    <div class="form-group">
      <h3>Acceso a la plataforma</h3>
    </div>
    <p>Usuario</p>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="Usuario">
          <img src="./img/letter.svg" width="25px" height="25px">
        </span>
      </div>
      <input type="text" class="form-control" placeholder="Usuario" aria-label="Username" aria-describedby="basic-addon1" name="Usuario" >
    </div>
    <p>Contraseña</p>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1">
          <img src="./img/candado.svg" width="25px" height="25px">
        </span>
      </div>
      <input type="text" class="form-control" placeholder="Contraseña" aria-label="Username" aria-describedby="basic-addon1" name="Clave">
    </div>
    <button type="submit" class="btn btn-primary"><a href="./mainMenuAlumnos.php">Ingresar</a></button>
    <div class="form-group">
      <label id="olvidar" for="inputOlvidar">¿Olvidó su usuario o Contraseña?</label><br>
      <button type="submit" class="btn btn-secondary" id="iniciarInvitado">Ingresar como invitado</button>
    </div>
  </form>
</div>
</body>
                              <!---------------------------------------------BOOTSTRAP--------------------------------------------------->
<?php
require ('./views/Bootstrap.php');
?>
</html>