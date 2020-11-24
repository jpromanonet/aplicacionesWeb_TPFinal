<?php require APP_ROOT . "/views/partial/header.php"; ?>
<?php require APP_ROOT . "/views/partial/navbar.php"; ?>
<?php require APP_ROOT . "/views/partial/sidebar.php"; ?>
<article>
  <!-- Listado de Mesas Finales Inscripción -->
  <div class="container">
    <?php flash('inscripcionmesa_index_mensaje'); ?>
    <div class="row">
      <div class="col-12 text-center">
        <h4>En ésta sección podrás Ver las Mesas Habilitas.</h4>
      </div>
    </div>
    <table id="tablaInscripcionMesas" class="table table-bordered table-sm table-hover table-striped nowrap" style="width:100%">
      <thead class="thead-dark">
        <tr>
          <th scope="col" class="col-1">#</th>
          <th scope="col">Materia</th>
          <th scope="col">Aula</th>
          <th scope="col">Fecha</th>
          <th scope="col" class="col-1">Acciones</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
    <!--/Listado de Mesas Finales Inscripción -->
    <!-- Modal Inscribir -->
    <div class="modal fade" id="modalInscribir" tabindex="-1" role="dialog" aria-labelledby="modalInscribirTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="modalInscribirLongTitle">Inscribirme</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h5 class="text-bold">¿Estas seguro que te Quieres Inscribir?</h5>
            <h6 id="fecha"></h6>
            <h6 id="materia"></h6>
            <form action="<?php echo URL_ROOT; ?>/inscripcionmesa/store" method="post">
              <input type="hidden" name="id" id="id" value="">
              <?php generateInputCsrf(); ?>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Inscribirme</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    <!--/Modal Eliminar -->
  </div>
</article>
<?php require APP_ROOT . "/views/partial/footer.php"; ?>