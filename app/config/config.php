<?php
defined('BASEPATH') or exit('No se permite acceso directo');
/**Parámetro de Configuración para la 
 * conexión a la Base de datos.
 **/
/**DB_HOST Servidor de la Base de datos.*/
define('DB_HOST', 'localhost');
/**DB_USER Usuario de la Base de datos.*/
define('DB_USER', 'root');
/**DB_PASS Contraseña de la Base de datos.*/
define('DB_PASS', '');
/**DB_NAME Nombre de la Base de datos.*/
define('DB_NAME', 'aplicacionesweb_tpfinal');
/**DB_CHARSET Codificación para la conexión de la Base de datos.*/
define('DB_CHARSET', 'utf8');
/***APP_ENV Entorno de la Aplicacion local,development,production. */
define('APP_ENV', 'development');
/**APP_ROOT Ruta Raíz de la Aplicación */
define('APP_ROOT', dirname(dirname(__FILE__)));
/**Protocolo del Servidor */
define('PROTOCOL',(!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] != 'on') ? 'http://' : 'https://');
/**URL_ROOT URL Raíz de la Aplicación */
define('URL_ROOT', PROTOCOL.'aplicacioneswebtpfinal.test');
/**Zona Horaria por Defecto */
date_default_timezone_set('America/Argentina/Buenos_Aires');
/**Nombre CSRF TOKEN */
define('CSRF_TOKEN_NAME', 'csrf_token');
/**Tiempo de Duracion del CSRF_TOKEN (10 min.) */
define('CSRF_TOKEN_EXPIRE', 3600);
/**SITE_NAME Nombre de la Aplicación */
define('SITE_NAME', 'Aplicaciones Web UNLZ');
/**SITE_NAME Version de la Aplicación */
define('APP_VERSION', '1.0.2');
/**APP_DATE Fecha de Version de la Aplicación */
define('APP_DATE', '30/10/2020');
/**APP_DATE_TIME_FORMAT Formato de Fecha y Hora de la Aplicación */
define('APP_DATE_TIME_FORMAT', 'd/m/Y H:i:s');
