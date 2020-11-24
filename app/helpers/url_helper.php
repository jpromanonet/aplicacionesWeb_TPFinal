<?php
defined('BASEPATH') or exit('No se permite acceso directo');
    /**Helper url redirect
     * Hace un header location a la pagina que se le pase por parámetros
     * Ejemplo redirect('users/login');
     * @param string $page pagina a redirigir
     * @return void
     *
    **/
    function redirect($page){
        //header('Location: '.URL_ROOT.'/'.$page);
        echo '<script type="text/javascript">';
        echo 'window.location.href="'.URL_ROOT.'/'.$page.'";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url='.URL_ROOT.'/'.$page.'" />';
        echo '</noscript>';

    }
    function back()
    {
        if(isset($_SERVER['HTTP_REFERER'])) {
            $previous = $_SERVER['HTTP_REFERER'];
        }
        //header("Location:{$previous}");
        echo '<script type="text/javascript">';
        echo 'window.location.href="'.$previous.'";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url='.$previous.'" />';
        echo '</noscript>';
    }
