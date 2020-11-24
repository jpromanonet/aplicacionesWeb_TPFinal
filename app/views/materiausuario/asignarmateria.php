<?php require APP_ROOT . "/views/partial/header.php"; ?>
<?php require APP_ROOT . "/views/partial/navbar.php"; ?>
<?php require APP_ROOT . "/views/partial/sidebar.php"; ?>
<!-- Asignar Materias Usuarios -->
<article class="MainMenu">
    <div class="row">
        <div class="col-12 text-center">
            <h4>En ésta sección vas Asignar Materias</h4>
        </div>
    </div>
    <div class="container">
        <?php flash('materiausuario_asignar_mensaje'); ?>
        <form action="<?php echo URL_ROOT; ?>/materiausuario/store" method="post">
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="nombre">Nombre <sup>*</sup></label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo (!empty($data['nombre'])) ? $data['nombre'] : ''; ?>" readonly>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="apellido">Apellido <sup>*</sup></label>
                    <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo (!empty($data['apellido'])) ? $data['apellido'] : ''; ?>" readonly>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="dni">Documento <sup>*</sup></label>
                    <input type="text" class="form-control" id="dni" name="dni" value="<?php echo (!empty($data['dni'])) ? $data['dni'] : ''; ?>" readonly>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="carrera">Carrera <sup>*</sup></label>
                    <select id="carrera" name="carrera" class="form-control select2" data-placeholder="Seleccione una Carrera" data-allow-clear="1" required>
                        <option></option>
                        <?php foreach ($data['carreras'] as $carrera) : ?>
                            <option value="<?php echo $carrera->id ?>" <?php echo (!empty($data['carrera']) && $carrera->id == $data['carrera']) ? 'selected' : ''; ?>><?php echo $carrera->nombre ?></option>
                        <?php endforeach; ?>
                    </select>
                    <span class="invalid-feedback"><?php echo (!empty($data['carrera_err'])) ?  $data['carrera_err'] : ''; ?></span>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="materias">Materia <sup>*</sup></label>
                    <select id="materias" multiple name="materias[]" class="form-control select2" data-placeholder="Seleccione las Materias" data-allow-clear="1" required>
                    </select>
                    <span class="invalid-feedback"><?php echo (!empty($data['materias_err'])) ?  $data['materias_err'] : ''; ?></span>
                </div>
            </div>
            <input type="hidden" id="usuario_id" name="usuario_id" value="<?php echo $data['id'] ?>">
            <?php generateInputCsrf(); ?>
            <div class="form-row text-md-center">
                <div class="col-md-6 mb-3">
                    <button type="submit" class="btn btn-success btn-lg">Asignar Materias</button>
                </div>
                <div class="col-md-6 mb-3">
                    <a href="<?php echo URL_ROOT; ?>/usuario" class="btn btn-danger btn-lg">Cancelar</a>
                </div>
            </div>
        </form>
        <hr>
        <!--Listado de Maetrias Usuarios -->
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10">
                <table id="tablaMateriasUsuario" class="table table-bordered table-sm table-hover table-striped nowrap" style="width:100%">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Materia</th>
                            <th scope="col">Fecha/Hora de Alta</th>
                            <th scope="col">Acciones</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="col-1"></div>
        </div>
        <!--/Listado de Maetrias Usuarios -->
        <!-- Modal Eliminar -->
        <div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="modalEliminarTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modalEliminarLongTitle">Eliminar Usuario</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5 class="text-bold">¿Estas seguro de Eliminar está Materia?</h5>
                        <form action="<?php echo URL_ROOT; ?>/materiausuario/destroy" method="post">
                            <input type="hidden" name="id" id="id" value="">
                            <?php generateInputCsrf(); ?>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!--/Modal Eliminar -->
    </div>
</article>
<!-- Asignar Materias Usuarios -->
<?php require APP_ROOT . "/views/partial/footer.php"; ?>