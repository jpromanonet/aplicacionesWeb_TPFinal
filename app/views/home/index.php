<?php require APP_ROOT . "/views/partial/header.php"; ?>
<?php require APP_ROOT . "/views/partial/navbar.php"; ?>
<?php require APP_ROOT . "/views/partial/sidebar.php"; ?>
<!-- Alta de Usuarios -->
<article class="MainMenu">
    <div class="container">
    <h2>Resumen diario</h2>
    <div class="card">
        <div class="card-body">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <img src="<?php echo URL_ROOT ?>/img/TorneoAjedrez.png" class="d-block w-100" alt="TorneoAjedrez">
                        <div class="carousel-caption d-none d-md-block">
                            <h5></h5>
                            <p>Convocatoria torneo de ajedrez</p>
                        </div>
                        </div>
                        <div class="carousel-item">
                        <img src="<?php echo URL_ROOT ?>/img/EstudiantesBarbijos.jpg" class="d-block w-100" alt="EstudiantesBarbijos">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>La nueva normalidad en UNLZ</h5>
                            <p>Presentamos los protocolos que estarán vigentes en la vuelta a las aulas</p>
                        </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                    </div>
        </div>
    </div><br>

    <div class="card-deck">
        <div class="card">
            <div class="card-body">
            <h5 class="card-title"></h5>
            <p class="card-text">
                <div class="media">
                    <div class="media-body">
                        <h5 class="mt-0 mb-1">Sorprendete</h5>
                        Escaneá el código QR con tu teléfono y no te pierdas de ninguna noticia en nuestra página oficial.
                    </div>
                    <img src="<?php echo URL_ROOT ?>/img/QR2.png" class="ml-3" alt="..." width="100px" height="130px">
                </div><hr>
                <div class="media">
                    <div class="media-body">
                        <h5 class="mt-0 mb-1">UNLZ Derecho</h5>
                        Se acelera y agiliza el desarrollo de la carrera gracias a nuevas implementaciones en el sistema, por desarrolladores de la sede de ingenieria de la UNLZ
                    </div>
                    <img src="<?php echo URL_ROOT ?>/img/UNLZderecho.jpg" class="ml-3" alt="..." width="100px" height="120px">
                </div><hr>
                <div class="media">
                    <div class="media-body">
                        <h5 class="mt-0 mb-1">¡Atención!</h5>
                        Se lanza la convocatoria “Universidades Emprendedoras” – Planes Estratégicos de Desarrollo Emprendedor.
                    </div>
                    <img src="<?php echo URL_ROOT ?>/img/logo.jpg" class="ml-3" alt="..." width="100px" height="120px">
                </div><hr>
                <div class="media">
                    <div class="media-body">
                        <h5 class="mt-0 mb-1">UNLZ Agraria</h5>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.
                    </div>
                    <img src="<?php echo URL_ROOT ?>/img/UNLZverde.jpg" class="ml-3" alt="..." width="100px" height="120px">
                </div>
            </p>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
            <p class="card-text">
                <a class="twitter-timeline" data-width="600" data-height="600" data-theme="light" href="https://twitter.com/UNLZoficial?ref_src=twsrc%5Etfw"></a>
                <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
            </p>
            </div>
        </div>
    </div>
</article>
<!-- Alta de Usuarios -->
<?php require APP_ROOT . "/views/partial/footer.php"; ?>