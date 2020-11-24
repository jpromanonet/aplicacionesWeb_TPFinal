<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Fuentes -->
  <link href="<?php echo URL_ROOT; ?>/css/fonts/Merriweatherital.css" rel="stylesheet">
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo URL_ROOT; ?>/img/favicon.ico">
  <!-- CSS Bootstrap -->
  <link rel="stylesheet" href="<?php echo URL_ROOT; ?>/css/bootstrap.min.css" />
  <!-- CSS Fontawesome -->
  <link rel="stylesheet" href="<?php echo URL_ROOT; ?>/fontawesome/css/all.css">
  <!-- CSS APP -->
  <link rel="stylesheet" href="<?php echo URL_ROOT; ?>/css/EstilosGeneral.css" />
  <!-- CSS Select2 -->
  <link rel="stylesheet" href="<?php echo URL_ROOT; ?>/css/select2.min.css" />
  <link rel="stylesheet" href="<?php echo URL_ROOT; ?>/css/select2-bootstrap4.css" />
  <!-- Check CSS Datatables -->
  <?php
  if (isset($data['dataTables'])) {
    require_once APP_ROOT . "/views/partial/css/cssDataTables.php";
  }
  ?>
  <title><?php echo isset($data['titulo']) ? $data['titulo'] : SITE_NAME; ?></title>
</head>

<body>