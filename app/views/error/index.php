<?php require APP_ROOT . "/views/partial/header.php"; ?>
<?php require APP_ROOT ."/views/partial/navbar.php"; ?>
<article class="Errores">
<div class="container">
  <div class="row">
    <div class="col-2">
      <img src="<?php echo URL_ROOT; ?>/img/warning.svg" width="100%" Height="100%">
    </div>
    <div class="col-8">
      <h1 class="error">¡Oh, no!</h1>
      <h2 class="error text-justify">Se ha producido un error. Para continuar, vuelva atrás o acceda a otra sección</h2>
      <h3 class="error text-justify"><?php echo (!empty($data['error'])) ? $data['error'] : '' ;?>
    </h3>
    </div>
    <div class="col-2">
      <img src="<?php echo URL_ROOT; ?>/img/warning.svg" width="100%" Height="100%">
    </div>
  </div>
  <div class="row">
    <div class="col-4"></div>
    <div class="col-4">
      <img src="<?php echo URL_ROOT; ?>/img/robot.svg" width="100%" Height="100%">
    </div>
    <div class="col-4"></div>
  </div>
</div>
</article>
<?php require APP_ROOT . "/views/partial/footer.php"; ?>