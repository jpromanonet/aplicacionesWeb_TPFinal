<?php
defined('BASEPATH') or exit('No se permite acceso directo');
class Usuario
{
    /**Atributo de Conexión */
    private $db;
    public function __construct()
    {
        /**Conexión a la Base de Datos */
        $this->db = Database::getInstance();
    }
    /**Realiza un INSERT de Usuario con todos los datos que 
     * del usuario al dar de Alta.
     *
     * @param [array] $data Datos del Usuario a dar de alta
     * @return [boolean] TRUE si se hizo el INSERT sino FALSE
     */
    public function store($data)
    {
        $this->db->query('INSERT INTO 
                            usuarios (rol_id, email, password, nombre, apellido, dni) 
                        VALUES 
                        (:rol_id, :email, :password, :nombre, :apellido, :dni)
                        ');
        $this->db->bind(':rol_id', $data['rol']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['clave']);
        $this->db->bind(':nombre', $data['nombre']);
        $this->db->bind(':apellido', $data['apellido']);
        $this->db->bind(':dni', $data['dni']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    /**Realiza un UPDATE de Usuario con todos los datos que 
     * que se modificaron del Usuario.
     *
     * @param [array] $data Datos del Usuario a modificar.
     * @return [boolean] TRUE si se hizo el UPDATE sino FALSE
     */
    public function update($data)
    {
        $this->db->query('UPDATE usuarios 
                            SET rol_id = :rol_id, email = :email, nombre = :nombre, 
                                apellido = :apellido, dni = :dni 
                            WHERE id = :id
                        ');
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':rol_id', $data['rol']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':nombre', $data['nombre']);
        $this->db->bind(':apellido', $data['apellido']);
        $this->db->bind(':dni', $data['dni']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    /**Realiza un UPDATE de la Contraseña del Usuario.
     *
     * @param [array] $data Datos del Usuario a modificar.
     * @return [boolean] TRUE si se hizo el UPDATE sino FALSE
     */
    public function updatePassword($data)
    {
        $this->db->query('UPDATE usuarios 
                            SET password = :password
                            WHERE id = :id
                        ');
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':password', $data['clave']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    /**
     * Metodo por el cual se elimina el usuario,
     * la eliminación se realiza de manera logica, cambiando
     *
     * @param [int] $id ID del usuario a eliminar.
     * @return boolean TRUE si no existen errores caso contrario FALSE.
     */
    public function destroy($id)
    {
        $this->db->query('UPDATE usuarios SET deleted = TRUE WHERE id = :id');
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    /**
     * Verifica si existe el EMAIL en la Tabla Usuarios,
     * Si existe retorna Verdadero sino Falso
     * 
     * @param [string] $email Email a Buscar
     * @param [string] $id Opcional es en el caso de realizar un UPDATE
     * @return [boolean] TRUE or FALSE 
     */
    public function existsUsuarioByEmail($email, $id = null)
    {
        $filter = (!empty($id)) ? 'AND id <> :id' : '';
        $this->db->query("SELECT * FROM usuarios WHERE email = :email AND deleted IS FALSE $filter");
        $this->db->bind(':email', $email);
        if (!empty($filter)) {
            $this->db->bind(':id', $id);
        }
        $this->db->single();
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    /**
     * Verifica si existe el DNI en la Tabla Usuarios,
     * Si existe retorna Verdadero sino Falso
     * 
     * @param [string] $dni Documento a Buscar
     * @param [string] $id Opcional es en el caso de realizar un UPDATE
     * @return TRUE or FALSE
     */
    public function existsUsuarioByDocumento($dni, $id = null)
    {
        $filter = (!empty($id)) ? 'AND id <> :id' : '';
        $this->db->query("SELECT * FROM usuarios WHERE dni = :dni AND deleted IS FALSE $filter");
        $this->db->bind(':dni', $dni);
        if (!empty($filter)) {
            $this->db->bind(':id', $id);
        }
        $this->db->single();
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    /**Busca un usuario por ID y nos devuelve la información
     * del usuario.
     *
     * @param [int] $id
     * @return [objet] Filas como Objeto
     */
    public function getUsuarioById($id)
    {
        $this->db->query('SELECT * FROM usuarios WHERE id = :id AND deleted IS FALSE');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }
    /**Busca un usuario por Email y nos devuelve la información
     * del usuario.
     *
     * @param [string] $email Email a Buscar
     * @return [objet] Filas como Objeto
     */
    public function getUsuarioByEmail($email)
    {
        $this->db->query('SELECT * FROM usuarios WHERE email = :email AND deleted IS FALSE');
        $this->db->bind(':email', $email);
        return $this->db->single();
    }
    /**Busca un usuario por ID y nos devuelve la información
     * del usuario.
     *
     * @param [int] $id
     * @return [objet] Filas como Objeto
     */
    public function getUsuarioByDni($dni)
    {
        $this->db->query('SELECT * FROM usuarios WHERE dni = :dni AND deleted IS FALSE');
        $this->db->bind(':dni', $dni);
        return $this->db->single();
    }
    /**Se Obtiene todos los Usuarios Disponibles
     *
     * @return [objet] Filas como Objeto
     */
    public function getUsuarios()
    {
        $this->db->query('SELECT * FROM usuarios WHERE deleted IS FALSE');
        return $this->db->resultSet();
    }
    /**Se Obtiene todos los Usuarios Disponibles
     * para ser usado con DataTables
     *
     * @return [objet] Filas como Objeto
     */
    public function getUsuariosDataTables($data)
    {
        $searchQuery = "";
        /**Comprobamos si es -1 es decir mostramos todos */
        $limit = ($data['rowPerPage'] == -1) ? "" : " LIMIT :row , :rowPerPage";
        /**Comprobamos si existe un filtro en la búsqueda */
        if (!empty($data['searchValue'])) {
            /**Consulta per Buscar los Valores */
            $searchQuery = " AND (u.nombre LIKE :search OR u.apellido LIKE :search OR u.dni LIKE :search OR u.email LIKE :search OR r.nombre LIKE :search)";
        }
        $this->db->query("SELECT u.id, u.nombre,u.apellido, u.dni, u.email, r.nombre AS rol 
                            FROM usuarios u LEFT JOIN roles r ON u.rol_id = r.id
                            WHERE u.deleted IS FALSE $searchQuery
                            ORDER BY {$data["columnName"]} {$data["columnSortOrder"]} $limit
                        ");
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
     * Cuenta la cantidad de usuarios
     *
     * @param [string] $filter Valor a fieltrar es opcional
     * @return cantidad de registros
     */
    public function countUsuarios($filter = null)
    {
        $searchQuery = "";
        /**Comprobamos si existe un filtro en la búsqueda */
        if (!empty($filter)) {
            /**Consulta per Buscar los Valores */
            $searchQuery = " AND (u.nombre LIKE :search OR u.apellido LIKE :search OR u.dni LIKE :search OR u.email LIKE :search OR r.nombre LIKE :search)";
        }
        $this->db->query("SELECT u.nombre,u.apellido, u.dni, u.email, r.nombre AS rol 
                            FROM usuarios u LEFT JOIN roles r ON u.rol_id = r.id
                            WHERE u.deleted IS FALSE $searchQuery");
        if (!empty($searchQuery)) {
            $this->db->bind(':search', '%' . $filter . '%');
        }
        $this->db->resultSet();
        return $this->db->rowCount();
    }
}
