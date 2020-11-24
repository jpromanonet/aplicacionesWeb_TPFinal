<?php
defined('BASEPATH') or exit('No se permite acceso directo');

class Materia
{

    /**Atributo de Conexión */
    private $db;
    public function __construct()
    {
        /**Conexión a la Base de Datos */
        $this->db = Database::getInstance();
    }
    /**Se Obtiene todos las Materias de una Carrera
     * donde el Usuario no este Inscripto
     *
     * @return [objet] Filas como Objeto
     */
    public function getMateriasByCarreraNotHasUsuario($data)
    {
        $searchQuery = "";
        /**Comprobamos si existe un filtro en la búsqueda */
        if (!empty($data['search'])) {
            /**Consulta per Buscar los Valores */
            $searchQuery = " AND (nombre LIKE :search OR descripcion LIKE :search) ";
        }
        $this->db->query("SELECT *
                            FROM materias m
                            WHERE deleted IS FALSE AND carrera_id = :carrera_id $searchQuery AND m.id NOT IN (
                            SELECT materia_id FROM materias_usuarios WHERE deleted IS FALSE AND usuario_id = :usuario_id
                            )
                        ");
        $this->db->bind(':usuario_id', $data['usuario_id']);
        $this->db->bind(':carrera_id', $data['carrera_id']);
        if (!empty($searchQuery)) {
            $this->db->bind(':search', '%' . $data['search'] . '%');
        }
        return $this->db->resultSet();
    }
}
