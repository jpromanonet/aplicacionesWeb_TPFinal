<?php
defined('BASEPATH') or exit('No se permite acceso directo');

class Carrera{

    /**Atributo de Conexión */
    private $db;
    public function __construct()
    {
        /**Conexión a la Base de Datos */
        $this->db = Database::getInstance();
    }
    /**Se Obtiene todos las Carreras Disponibles
     *en la que se encuentra el usuario
     *
     * @return [objet] Filas como Objeto
     */
    public function getCarrerasUsuario($usuarioId)
    {
        $this->db->query("SELECT * FROM carreras c
                            WHERE deleted IS FALSE AND c.id IN 
                                (SELECT m.carrera_id 
                                    FROM materias_usuarios mu LEFT JOIN materias m ON mu.materia_id = m.id
                                    WHERE mu.deleted IS FALSE AND mu.usuario_id = :usuario_id
                                )
                        ");
        $this->db->bind(':usuario_id', $usuarioId);
        $resultSet = $this->db->resultSet();
        if ($this->db->rowCount() > 0) {
            return $resultSet;
        } else {
            return false;
        }
    }
        /**Se Obtiene todos las Carreras Disponibles
     *
     * @return [objet] Filas como Objeto
     */
    public function getCarreras()
    {
        $this->db->query('SELECT * FROM carreras WHERE deleted IS FALSE');
        return $this->db->resultSet();
    }

}