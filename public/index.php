<?php
/**Definimos el BASEPATH como TRUE para 
 * evitar el acceso directo a todos los los archivos 
 **/
define('BASEPATH', true);
/**Requerimos el Archivo de Arranque */
require_once '../app/bootstrap.php';
/**Activa los Errores según el Entorno de la Aplicacion. */
if (APP_ENV =='production') {
    error_reporting(0);
}else{
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

/**
 * Instanciaciamos Nuestra Librería Principal
 */
$init = Core::getInstance();