<?php
trait Singleton
{
    /**Propiedad Singleton*/
    private static $instance;
    /**getInstance
     * este método singleton devolverá una instancia de la clase.
     *@param no recibe parámetros
     *@return instancia de la clase
     */
    public static function getInstance()
    {
        if (!self::$instance instanceof self) {
            self::$instance = new self;
        }
        return self::$instance;
    }
}
