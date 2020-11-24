<?php
defined('BASEPATH') or exit('No se permite acceso directo');

class MesaFinal
{

    /**Atributo de Conexión */
    private $db;
    public function __construct()
    {
        /**Conexión a la Base de Datos */
        $this->db = Database::getInstance();
    }
    /**Se Obtiene todas las Mesas para Final
     *
     * @return [objet] Filas como Objeto
     */
    public function getMesasFinalesHasUsuario($id)
    {
        $this->db->query("SELECT m.nombre AS materia, a.nombre AS aula, mf.fecha
                            FROM
                                mesas_finales mf
                                LEFT JOIN materias m ON mf.materia_id = m.id
                                LEFT JOIN aulas a ON m.aula_id = a.id
                            WHERE 
                            mf.deleted IS FALSE
                            AND mf.fecha > NOW() AND 
                            mf.materia_id IN (SELECT materia_id 
                                                FROM materias_usuarios 
                                                WHERE 
                                                usuario_id = :usuario_id AND deleted IS FALSE)
                            AND  mf.id NOT IN (SELECT mesa_final_id 
                                                FROM inscripciones_mesas 
                                                    WHERE usuario_id = :usuario_id AND deleted IS FALSE)
                        ");
        $this->db->bind(':id', $id);
        return $this->db->resultSet();
    }
    /**Se Obtiene todas las Mesas para Final
     *
     * @return [objet] Filas como Objeto
     */
    public function getMesasFinalesHasUserDt($data)
    {
        $searchQuery = "";
        /**Comprobamos si es -1 es decir mostramos todos */
        $limit = ($data['rowPerPage'] == -1) ? "" : " LIMIT :row , :rowPerPage";
        /**Comprobamos si existe un filtro en la búsqueda */
        if (!empty($data['searchValue'])) {
            /**Consulta per Buscar los Valores */
            $searchQuery = " AND (m.nombre LIKE :search)";
        }
        $this->db->query("SELECT mf.id, m.nombre AS materia, a.nombre AS aula, mf.fecha AS fecha
                            FROM
                                mesas_finales mf
                                LEFT JOIN materias m ON mf.materia_id = m.id
                                LEFT JOIN aulas a ON m.aula_id = a.id
                            WHERE 
                            mf.deleted IS FALSE
                            AND mf.fecha > NOW() AND 
                            mf.materia_id IN (SELECT materia_id 
                                                FROM materias_usuarios 
                                                WHERE 
                                                usuario_id = :usuario_id AND deleted IS FALSE)
                            AND  mf.id NOT IN (SELECT mesa_final_id 
                                                FROM inscripciones_mesas 
                                                    WHERE usuario_id = :usuario_id AND deleted IS FALSE)
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
     * Cuenta la cantidad de Mesas Finales
     *
     * @param [string] $filter Valor a fieltrar es opcional
     * @return cantidad de registros
     */
    public function countMesasFinalHasUserDt($filter = null, $usuarioId)
    {
        $searchQuery = "";
        /**Comprobamos si existe un filtro en la búsqueda */
        if (!empty($filter)) {
            /**Consulta per Buscar los Valores */
            $searchQuery = " AND (m.nombre LIKE :search)";
        }
        $this->db->query("SELECT m.nombre AS materia, a.nombre AS aula, mf.fecha
                            FROM
                                mesas_finales mf
                                LEFT JOIN materias m ON mf.materia_id = m.id
                                LEFT JOIN aulas a ON m.aula_id = a.id
                            WHERE 
                            mf.deleted IS FALSE
                            AND mf.fecha > NOW() AND 
                            mf.materia_id IN (SELECT materia_id 
                                                FROM materias_usuarios 
                                                WHERE 
                                                usuario_id = :usuario_id AND deleted IS FALSE)
                            AND  mf.id NOT IN (SELECT mesa_final_id 
                                                FROM inscripciones_mesas 
                                                    WHERE usuario_id = :usuario_id AND deleted IS FALSE)
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
