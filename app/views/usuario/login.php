<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo URL_ROOT; ?>/css/fonts/Merriweatherital.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo URL_ROOT; ?>/img/favicon.ico">
    <link rel="stylesheet" href="<?php echo URL_ROOT; ?>/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo URL_ROOT; ?>/fontawesome/css/all.css">
    <link rel="stylesheet" href="<?php echo URL_ROOT; ?>/css/EstiloInicioSesion.css" />
    <title><?php echo isset($data['titulo']) ? $data['titulo'] : SITE_NAME; ?></title>
</head>

<body>
    <nav class="fixed-top navbar navbar-dark bg-primary" id="navBar">
        <a href="<?php echo URL_ROOT; ?>" class="navbar-brand nav">
            <img src="<?php echo URL_ROOT; ?>/img/logo.png" alt="logo" height="50px" width="190px">
        </a>
    </nav>
    <div class="campus">
        <h1>UNLZ Ingenieria</h1><br>
        <h1>Aplicaciones Web</h1><br>
    </div>
    <div class="Formulario">
        <form action="<?php echo URL_ROOT; ?>/usuario/startsession" method="post">
            <div class="form-group">
                <h3>Acceso a la plataforma</h3>
            </div>
            <p>Usuario</p>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="Usuario">
                        <img src="<?php echo URL_ROOT; ?>/img/letter.svg" width="25px" height="25px">
                    </span>
                </div>
                <input type="email" class="form-control <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" placeholder="email" aria-label="Username" aria-describedby="basic-addon1" name="email" value="<?php echo (!empty($data['email'])) ? $data['email'] : ''; ?>" required>
                <span class="invalid-feedback"><?php echo (!empty($data['email_err'])) ?  $data['email_err'] : '' ; ?></span>
            </div>
            <p>Contraseña</p>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                        <img src="<?php echo URL_ROOT; ?>/img/candado.svg" width="25px" height="25px">
                    </span>
                </div>
                <input type="password" class="form-control <?php echo (!empty($data['clave_err'])) ? 'is-invalid' : ''; ?>" placeholder="Contraseña" aria-label="Username" aria-describedby="basic-addon1" name="clave" value="<?php echo (!empty($data['clave'])) ? $data['clave'] : ''; ?>" required>
                <span class="invalid-feedback"><?php echo (!empty($data['clave_err'])) ?  $data['clave_err'] : '' ; ?></span>
            </div>
            <?php generateInputCsrf(); ?>
            <button type="submit" class="btn btn-primary">Ingresar</button>
<!--             <div class="form-group">
                <label id="olvidar" for="inputOlvidar">¿Olvidó su usuario o Contraseña?</label><br>
            </div> -->
        </form>
    </div>
<?php require APP_ROOT . "/views/partial/footer.php"; ?>