<!-------------------------------------NAV--------------------------------------------->  
<nav class="fixed-top navbar navbar-dark" id="navBar">
    <a href="<?php echo URL_ROOT; ?>" class="navbar-brand nav">
      <img src="<?php echo URL_ROOT; ?>/img/logo.png" alt="logo" height="50px" width="190px">
    </a>
    <form class="form-inline">
      <div class="btn-group dropleft" role="group">
        <button id="Mensajes" type="button" class="btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="<?php echo URL_ROOT; ?>/img/speech-bubble.svg" width="20px" height="20px">
        </button>
        <div class="dropdown-menu pull-left" aria-labelledby="Mensajes">
          <a class="dropdown-item" href="#">Casilla de mensajes vacia</a>
        </div>
      </div>
      <div class="btn-group dropleft">
        <button id="User" type="button" class="btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="<?php echo URL_ROOT; ?>/img/user.svg" width="30px" height="30px">
        </button>
        <div class="dropdown-menu" aria-labelledby="User">
          <a class="dropdown-item" href="#"><img src="<?php echo URL_ROOT; ?>/img/user.svg" width="20px" height="20px"> <?php echo isset($_SESSION['usuario_nombre']) ? $_SESSION['usuario_nombre'] : '' ; ?></a>
          <a class="dropdown-item" href="<?php echo URL_ROOT; ?>/usuario/changepassword"><img src="<?php echo URL_ROOT; ?>/img/padlock.svg" width="20px" height="20px"> Cambiar Contraseña</a>
          <div class="dropdown-divider">
          </div>
<!--           <a class="dropdown-item" href="#"><img src="<?php echo URL_ROOT; ?>/img/speedometer.svg" width="20px" height="20px"> Tablero</a>
          <a class="dropdown-item" href="#"> <img src="<?php echo URL_ROOT; ?>/img/calendar.svg" width="20px" height="20px"> Calificaciones</a>
          <a class="dropdown-item" href="#"> <img src="<?php echo URL_ROOT; ?>/img/letter.svg" width="20px" height="20px"> Mensajes</a>
          <a class="dropdown-item" href="#"> <img src="<?php echo URL_ROOT; ?>/img/Herramienta.svg" width="20px" height="20px"> Preferencias</a>
          <div class="dropdown-divider"></div> -->
          <a class="dropdown-item" href="<?php echo URL_ROOT.'/usuario/logout'; ?>"> <img src="<?php echo URL_ROOT; ?>/img/SignOut.svg" width="20px" height="20px"> Salir</a>
        </div>
      </div>
    </form>
  </nav>
<!-------------------------------------NAV--------------------------------------------->