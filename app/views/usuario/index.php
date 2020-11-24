<?php require APP_ROOT . "/views/partial/header.php"; ?>
<?php require APP_ROOT . "/views/partial/navbar.php"; ?>
<?php require APP_ROOT . "/views/partial/sidebar.php"; ?>
<article>
<!-- Listado de Usuarios -->
  <div class="container-fluid">
    <?php flash('usuario_index_mensaje'); ?>
    <div class="row">
      <div class="col-12 text-center">
        <h4>En ésta sección usted podrá Ver Todos Los Usuarios.</h4>
      </div>
    </div>
    <table id="tablaUsuarios" class="table table-bordered table-sm table-hover table-striped nowrap" style="width:100%">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Apellido</th>
          <th scope="col">Nombre</th>
          <th scope="col">D.N.I</th>
          <th scope="col">Email</th>
          <th scope="col">Rol</th>
          <th scope="col">Acciones</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
<!--/Listado de Usuarios -->
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
          <h5 class="text-bold">¿Estas seguro de Eliminar el Usuario?</h5>
          <form action="<?php echo URL_ROOT; ?>/usuario/destroy" method="post">
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
<?php require APP_ROOT . "/views/partial/footer.php"; ?>