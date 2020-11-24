<?php
defined('BASEPATH') or exit('No se permite acceso directo');

class InscripcionMesa
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
    public function store($usuarioId, $mesaId)
    {
        $this->db->query('INSERT INTO 
                            inscripciones_mesas (usuario_id, mesa_final_id) 
                        VALUES 
                        (:usuario_id, :mesa_final_id)
                        ');
        $this->db->bind(':usuario_id', $usuarioId);
        $this->db->bind(':mesa_final_id', $mesaId);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    /**Se Obtiene todas las Inscripciones 
     *
     * @return [objet] Filas como Objeto
     */
    public function getInscripcionMesasUserDt($data)
    {
        $searchQuery = "";
        /**Comprobamos si es -1 es decir mostramos todos */
        $limit = ($data['rowPerPage'] == -1) ? "" : " LIMIT :row , :rowPerPage";
        /**Comprobamos si existe un filtro en la búsqueda */
        if (!empty($data['searchValue'])) {
            /**Consulta per Buscar los Valores */
            $searchQuery = " AND (m.nombre LIKE :search)";
        }
        $this->db->query("SELECT m.nombre AS materia, a.nombre AS aula, mf.fecha, im.created_at  
                                FROM 
                                inscripciones_mesas im 
                                LEFT JOIN mesas_finales mf ON im.mesa_final_id = mf.id
                                LEFT JOIN materias m ON mf.materia_id = m.id
                                LEFT JOIN aulas a ON m.aula_id = a.id
                                WHERE 
                                    im.deleted IS FALSE AND im.usuario_id = :usuario_id
                            $searchQuery
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
     * Cuenta la cantidad de Inscripciones
     *
     * @param [string] $filter Valor a fieltrar es opcional
     * @return cantidad de registros
     */
    public function countInscripcionMesasUserDt($filter = null, $usuarioId)
    {
        $searchQuery = "";
        /**Comprobamos si existe un filtro en la búsqueda */
        if (!empty($filter)) {
            /**Consulta per Buscar los Valores */
            $searchQuery = " AND (m.nombre LIKE :search)";
        }
        $this->db->query("SELECT m.nombre AS materia, a.nombre AS aula, mf.fecha, im.created_at  
                            FROM 
                            inscripciones_mesas im 
                            LEFT JOIN mesas_finales mf ON im.mesa_final_id = mf.id
                            LEFT JOIN materias m ON mf.materia_id = m.id
                            LEFT JOIN aulas a ON m.aula_id = a.id
                            WHERE 
                                im.deleted IS FALSE AND im.usuario_id = :usuario_id
                                 $searchQuery
                        ");
        $this->db->bind(':usuario_id', $usuarioId);
        if (!empty($searchQuery)) {
            $this->db->bind(':search', '%' . $filter . '%');
        }
        $this->db->resultSet();
        return $this->db->rowCount();
    }
}
