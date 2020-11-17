<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/MainMenuStyle.css">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Tablero</title>
</head>
  <body>
                                    <!-------------------------------------NAV--------------------------------------------->
    <nav class="fixed-top navbar navbar-dark" id="navBar">
        <a class="navbar-brand nav">
          <img src="./img/logo.png" alt="logo" height="50px" width="190px">
        </a>
        <form class="form-inline">
          <div class="btn-group" role="group">
            <button id="btnGroupDrop1" type="button" class="btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img src="./img/world.svg" alt="mundito" width="20px" height="20px">
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#">English (en)</a>
              <a class="dropdown-item" href="#">Español - Mexico (es_mex)</a>
            </div>
          </div>
         <!-- <div class="btn-group" role="group">
            <button id="notificacion" type="button" class="btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img src="./img/notification.svg" width="20px" height="20px"  alt="notificaciones">
            </button>
            <div class="dropdown-menu pull-left" aria-labelledby="notificacion">
              <a class="dropdown-item" href="#">Sin notificaciones</a>
            </div>
          </div> -->
          <div class="btn-group dropleft" role="group">
            <button id="Mensajes" type="button" class="btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img src="./img/speech-bubble.svg" width="20px" height="20px">
            </button>
            <div class="dropdown-menu pull-left" aria-labelledby="Mensajes">
              <a class="dropdown-item" href="#">Casilla de mensajes vacia</a>
            </div>
          </div>
          <div class="btn-group dropleft">
            <button id="User" type="button" class="btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img src="./img/user.svg" width="30px" height="30px">
            </button>
            <div class="dropdown-menu" aria-labelledby="User" >
                <a class="dropdown-item" href="#"><img src="./img/user.svg" width="20px" height="20px" > Usuario</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#"><img src="./img/speedometer.svg" width="20px" height="20px" > Tablero</a>
                <a class="dropdown-item" href="#"><img src="./img/Perfil.svg" width="20px" height="20px" > Perfil</a>
                <a class="dropdown-item" href="#"> <img src="./img/calendar.svg" width="20px" height="20px" > Calificaciones</a>
                <a class="dropdown-item" href="#"> <img src="./img/letter.svg" width="20px" height="20px" > Mensajes</a>
                <a class="dropdown-item" href="#"> <img src="./img/Herramienta.svg" width="20px" height="20px" > Preferencias</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="inicioSesion.php"> <img src="./img/SignOut.svg" width="20px" height="20px" > Salir</a>
            </div>
          </div>
        </form>
    </nav>
                                 <!-------------------------------------NAV--------------------------------------------->

</body>