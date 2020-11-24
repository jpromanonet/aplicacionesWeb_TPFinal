<?php require APP_ROOT . "/views/partial/header.php"; ?>
<?php require APP_ROOT . "/views/partial/navbar.php"; ?>
<?php require APP_ROOT . "/views/partial/sidebar.php"; ?>
<article>
  <!-- Listado de Mesas Finales Inscripción del Usuario-->
  <div class="container">
    <?php flash('inscripcionmesa_index_mensaje'); ?>
    <div class="row">
      <div class="col-12 text-center">
        <h4>En ésta sección podrás Ver las Mesas en las que te Inscribiste.</h4>
      </div>
    </div>
    <table id="tablaInscripcionMesasUsuario" class="table table-bordered table-sm table-hover table-striped nowrap" style="width:100%">
      <thead class="thead-dark">
        <tr>
          <th scope="col" class="col-1">#</th>
          <th scope="col">Materia</th>
          <th scope="col">Aula</th>
          <th scope="col">Fecha Mesa</th>
          <th scope="col">Fecha de Inscripción</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
    <!--/Listado de Mesas Finales Inscripción del Usuario -->
  </div>
</article>
<?php require APP_ROOT . "/views/partial/footer.php"; ?>