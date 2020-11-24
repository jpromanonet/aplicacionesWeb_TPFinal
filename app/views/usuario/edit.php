<?php require APP_ROOT . "/views/partial/header.php"; ?>
<?php require APP_ROOT . "/views/partial/navbar.php"; ?>
<?php require APP_ROOT . "/views/partial/sidebar.php"; ?>
<!-- Editar Usuarios -->
<article class="MainMenu">
    <div class="row">
        <div class="col-12 text-center">
            <h4>Editando Información Usuario</h4>
        </div>
    </div>
    <div class="container">
    <?php flash('usuario_edit_mensaje'); 
    //echo date('H:i:s',$_SESSION["csrf_token_expire"]);
    ?>
        <form action="<?php echo URL_ROOT; ?>/usuario/update" method="post">
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="nombre">Nombre <sup>*</sup></label>
                    <input type="text" class="form-control <?php echo (!empty($data['nombre_err'])) ? 'is-invalid' : ''; ?>" id="nombre" name="nombre" value="<?php echo (!empty($data['nombre'])) ? $data['nombre'] : ''; ?>" required>
                    <span class="invalid-feedback"><?php echo (!empty($data['nombre_err'])) ?  $data['nombre_err'] : '' ; ?></span>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="apellido">Apellido <sup>*</sup></label>
                    <input type="text" class="form-control <?php echo (!empty($data['apellido_err'])) ? 'is-invalid' : ''; ?>" id="apellido" name="apellido" value="<?php echo (!empty($data['apellido'])) ? $data['apellido'] : ''; ?>" required>
                    <span class="invalid-feedback"><?php echo (!empty($data['apellido_err'])) ?  $data['apellido_err'] : '' ; ?></span>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="dni">Documento <sup>*</sup></label>
                    <input type="text" class="form-control <?php echo (!empty($data['dni_err'])) ? 'is-invalid' : ''; ?>" id="dni" name="dni" value="<?php echo (!empty($data['dni'])) ? $data['dni'] : ''; ?>" required>
                    <span class="invalid-feedback"><?php echo (!empty($data['dni_err'])) ?  $data['dni_err'] : ''; ?></span>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="dni">Rol <sup>*</sup></label>
                    <select name="rol" id="rol" class="form-control" required>
                        <option selected disabled value="">Seleccione</option>
                        <?php foreach ($data['roles'] as $rol): ?>
                        <option value="<?php echo $rol->id ?>" <?php echo (!empty($data['rol']) && $rol->id == $data['rol']) ? 'selected' : '' ; ?>><?php echo $rol->nombre ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="email">Email <sup>*</sup></label>
                    <input type="email" class="form-control <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?php echo (!empty($data['email'])) ? $data['email'] : ''; ?>" required>
                    <span class="invalid-feedback"><?php echo (!empty($data['email_err'])) ?  $data['email_err'] : '' ;  ?></span>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="remail">Repetir Email <sup>*</sup></label>
                    <input type="email" class="form-control <?php echo (!empty($data['remail_err'])) ? 'is-invalid' : ''; ?>" id="remail" name="remail" value="<?php echo (!empty($data['remail'])) ? $data['remail'] : ''; ?>" required>
                    <span class="invalid-feedback"><?php echo (!empty($data['remail_err'])) ?  $data['remail_err'] : '' ;  ?></span>
                </div>
            </div>
            <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
            <?php generateInputCsrf(); ?>
            <div class="form-row text-md-center">
            <div class="col-md-4 mb-3">
                <button type="submit" class="btn btn-success btn-lg">Guardar Cambios</button>
            </div>
            <div class="col-md-4 mb-3">
                <a href="<?php echo URL_ROOT; ?>/usuario" class="btn btn-danger btn-lg">Cancelar</a>
            </div>
            <?php if ($data['rol'] == 2 || $data['rol'] == 3): ?>
            <div class="col-md-4 mb-3">
                <a href="<?php echo URL_ROOT; ?>/materiausuario/asignarmateria/<?php echo $data['dni'] ?>" class="btn btn-info btn-lg">Editar Materias</a>
            </div>
            <?php endif; ?>
            </div>
        </form>
    </div>
</article>
<!--/Editar Usuarios -->
<?php require APP_ROOT . "/views/partial/footer.php"; ?>