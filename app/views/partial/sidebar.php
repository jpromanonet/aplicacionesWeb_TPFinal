<!--------------------------------------------ASIDE-------------------------------------------->
<div class="area"></div>
<nav class="main-menu">
    <ul>
        <!--         <li class="has-subnav">
            <a href="#">
                <i class="fa fa-2x"><img src="<?php echo URL_ROOT; ?>/img/speedometer.svg" width="30px" height="30px" alt="" srcset=""></i>
                <span class="nav-text">
                    Tablero
                </span>
            </a>
        </li> -->
        <li>
            <a href="<?php echo URL_ROOT; ?>/home">
                <i class="fa fa-2x"><img src="<?php echo URL_ROOT; ?>/img/home.svg" width="30px" height="30px" alt="" srcset=""></i>
                <span class="nav-text">
                    Pagina inicial del sitio
                </span>
            </a>
        </li>
        <?php if ($_SESSION['usuario_rol'] == 3) : ?>
            <li>
                <a href="<?php echo URL_ROOT . '/inscripcionmesa' ?>">
                    <i class="fa fa-2x"><img src="<?php echo URL_ROOT; ?>/img/calendar.svg" width="30px" height="30px" alt="" srcset=""></i>
                    <span class="nav-text">
                        Inscribirse a Finales
                    </span>
                </a>
            </li>
            <li>
                <a href="<?php echo URL_ROOT . '/inscripcionmesa/show' ?>">
                    <i class="fa fa-2x"><img src="<?php echo URL_ROOT; ?>/img/calendar.svg" width="30px" height="30px" alt="" srcset=""></i>
                    <span class="nav-text">
                        Mis Inscripciones
                    </span>
                </a>
            </li>
        <?php endif; ?>
        <?php if ($_SESSION['usuario_rol'] == 1) : ?>
            <li>
                <a href="<?php echo URL_ROOT . '/mesafinal' ?>">
                    <i class="fa fa-2x"><img src="<?php echo URL_ROOT; ?>/img/calendar.svg" width="30px" height="30px" alt="" srcset=""></i>
                    <span class="nav-text">
                        Administrar Finales
                    </span>
                </a>
            </li>
            <li>
                <a href="<?php echo URL_ROOT . '/usuario' ?>">
                    <i class="fa fa-2x"><img src="<?php echo URL_ROOT; ?>/img/AdministrarProfesor.svg" width="30px" height="30px" alt="" srcset=""></i>
                    <span class="nav-text">
                        Administrar Usuarios
                    </span>
                </a>
            </li>
        <?php endif; ?>
    </ul>
</nav>
<!--------------------------------------------ASIDE-------------------------------------------->