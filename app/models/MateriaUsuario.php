<?php
defined('BASEPATH') or exit('No se permite acceso directo');

class MateriaUsuario
{

    /**Atributo de Conexión */
    private $db;
    public function __construct()
    {
        /**Conexión a la Base de Datos */
        $this->db = Database::getInstance();
    }
    /**Realiza un INSERT de las Materias Asignadas al Usuario 
     * con todos los datos de la materia.
     *
     * @param [int] $id ID del Usuario
     * @param [int] $id ID de la Materia
     * @return [boolean] TRUE si se hizo el INSERT sino FALSE
     */
    public function store($usuarioId, $materiaId)
    {
        $this->db->query('INSERT INTO 
                            materias_usuarios (usuario_id, materia_id) 
                        VALUES 
                        (:usuario_id, :materia_id)
                        ');
        $this->db->bind(':usuario_id', $usuarioId);
        $this->db->bind(':materia_id', $materiaId);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    /**Se Obtiene todos las Materias del Usuario
     * para ser usado con DataTables
     *
     * @return [objet] Filas como Objeto
     */
    public function getMateriasUsuarioDataTables($data)
    {
        $searchQuery = "";
        /**Comprobamos si es -1 es decir mostramos todos */
        $limit = ($data['rowPerPage'] == -1) ? "" : " LIMIT :row , :rowPerPage";
        /**Comprobamos si existe un filtro en la búsqueda */
        if (!empty($data['searchValue'])) {
            /**Consulta per Buscar los Valores */
            $searchQuery = " AND (m.nombre LIKE :search)";
        }
        $this->db->query("SELECT mu.id, m.nombre, mu.created_at 
                            FROM materias_usuarios mu LEFT JOIN materias m ON mu.materia_id = m.id
                            WHERE mu.deleted IS FALSE AND mu.usuario_id = :usuario_id $searchQuery
                            ORDER BY {$data["columnName"]} {$data["columnSortOrder"]} $limit
                        ");
        $this->db->bind(':usuario_id', $data['usuario_id']);
        if (!empty($limit)) {
            $this->db->bind(':row', $data['row'], PDO::PARAM_INT);
            $this->db->bind(':rowPerPage', $data['rowPerPage'], PDO::PARAM_INT);
        }
        if (!empty($searchQuery)) {
            $this->db->bind(':search', '%' . $data['searchValue'] . '%');
        }
        return $this->db->resultSet();
    }
    /**
     * Cuenta la cantidad de Materias del Usuario
     *
     * @param [string] $filter Valor a fieltrar es opcional
     * @return cantidad de registros
     */
    public function countMateriasUsuario($filter = null, $usuarioId)
    {
        $searchQuery = "";
        /**Comprobamos si existe un filtro en la búsqueda */
        if (!empty($filter)) {
            /**Consulta per Buscar los Valores */
            $searchQuery = " AND (m.nombre LIKE :search)";
        }
        $this->db->query("SELECT mu.id, m.nombre, mu.created_at 
                            FROM materias_usuarios mu LEFT JOIN materias m ON mu.materia_id = m.id
                            WHERE mu.deleted IS FALSE AND mu.usuario_id = :usuario_id $searchQuery
                        ");
        $this->db->bind(':usuario_id', $usuarioId);
        if (!empty($searchQuery)) {
            $this->db->bind(':search', '%' . $filter . '%');
        }
        $this->db->resultSet();
        return $this->db->rowCount();
    }
    /**
     * Metodo por el cual se elimina la materia de un usuario,
     * la eliminación se realiza de manera logica, cambiando
     *
     * @param [int] $id ID del usuario a eliminar.
     * @return boolean TRUE si no existen errores caso contrario FALSE.
     */
    public function destroy($id)
    {
        $this->db->query('UPDATE materias_usuarios SET deleted = TRUE WHERE id = :id');
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
