<?php require APP_ROOT . "/views/partial/header.php"; ?>
<?php require APP_ROOT . "/views/partial/navbar.php"; ?>
<?php require APP_ROOT . "/views/partial/sidebar.php"; ?>
<!-- Cambiar Contraseña -->
<article class="MainMenu">
    <div class="row">
        <div class="col-12 text-center">
            <h4>En ésta sección usted podrá Cambiar su Contraseña</h4>
        </div>
    </div>
    <div class="container">
        <?php flash('usuario_password_mensaje'); ?>
        <form action="<?php echo URL_ROOT; ?>/usuario/updatepassword" method="post">
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="oclave">Contraseña Anterior <sup>*</sup></label>
                    <input type="password" class="form-control <?php echo (!empty($data['oclave_err'])) ? 'is-invalid' : ''; ?>" id="oclave" name="oclave" value="<?php echo (!empty($data['oclave'])) ? $data['oclave'] : ''; ?>" required>
                    <span class="invalid-feedback"><?php echo (!empty($data['oclave_err'])) ?  $data['oclave_err'] : '';  ?></span>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="clave">Nueva Contraseña <sup>*</sup></label>
                    <input type="password" class="form-control <?php echo (!empty($data['clave_err'])) ? 'is-invalid' : ''; ?>" id="clave" name="clave" value="<?php echo (!empty($data['clave'])) ? $data['clave'] : ''; ?>" required>
                    <span class="invalid-feedback"><?php echo (!empty($data['clave_err'])) ?  $data['clave_err'] : '';  ?></span>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="rclave">Repetir Nueva Contraseña <sup>*</sup></label>
                    <input type="password" class="form-control <?php echo (!empty($data['rclave_err'])) ? 'is-invalid' : ''; ?>" id="rclave" name="rclave" value="<?php echo (!empty($data['rclave'])) ? $data['rclave'] : ''; ?>" required>
                    <span class="invalid-feedback"><?php echo (!empty($data['rclave_err'])) ?  $data['rclave_err'] : '';  ?></span>
                </div>
            </div>
            <?php generateInputCsrf(); ?>
            <div class="form-row text-md-center">
                <div class="col-md-6 mb-3">
                    <button type="submit" class="btn btn-success btn-lg">Cambiar Contraseña</button>
                </div>
                <div class="col-md-6 mb-3">
                    <a href="<?php echo URL_ROOT; ?>/home" class="btn btn-danger btn-lg">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</article>
<!-- Cambiar Contraseña -->
<?php require APP_ROOT . "/views/partial/footer.php"; ?>