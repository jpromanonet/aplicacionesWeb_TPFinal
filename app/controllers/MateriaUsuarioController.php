<?php
defined('BASEPATH') or exit('No se permite acceso directo');
class MateriausuarioController extends Controller
{
    public function __construct()
    {
        /**Peticiones por POST necesario el csrf_token */
        if (verifyCsrf()) {
            redirect('error/show/csrf');
            exit();
        }
        /**Instancia del Modelo Usuario*/
        $this->usuarioModel = $this->model('Usuario');
        /**Instancia del Modelo Materia Usuario*/
        $this->materiaUsuarioModel = $this->model('MateriaUsuario');
        /**Instancia del Modelo Carrera*/
        $this->carreraModel = $this->model('Carrera');
        /**Instancia del Modelo Materia*/
        $this->materiaModel = $this->model('Materia');
    }
    /**
     * Método por el cual se muestra la vista para 
     * con el formulario el alta o asignación de Materias 
     * a los Usuarios.
     * 
     * @return void
     */
    public function asignarmateria($dni = null)
    {
        /**Comprobamos que se Administrador */
        isAdmin();
        /**Si el Parámetro que Necesitamos es Null lo Redirigimos al Index de Usuario */
        if (is_null($dni)) {
            redirect('usuario');
            exit();
        }
        /**Obtenemos los Datos del Usuario */
        $usuario = $this->usuarioModel->getUsuarioByDni($dni);
        /**Obtenemos las Carreras */
        $carreras = $this->carreraModel->getCarrerasUsuario($usuario->id);
        if (!$carreras) {
            $carreras = $this->carreraModel->getCarreras();
        }
        $data =         $data = [
            'titulo' => 'Asignar Materias',
            'id' => $usuario->id,
            'nombre' => $usuario->nombre,
            'apellido' => $usuario->apellido,
            'dni' => $usuario->dni,
            'carreras' => $carreras,
            'dataTables' => 'MateriasUsuario',
        ];
        return $this->view('materiausuario/asignarmateria', $data);
    }
    /**
     * Se obtiene todos las Materias de un Usuarios
     * en la Cual no este Asignado o Anotado.
     * En Formato JSON para ser Usado en Select2
     *
     * @return json
     */
    public function getMateriasByCarreraNotHasUsuario()
    {
        /**Array para el response */
        $dataResponse = [];
        /**Recepción de Datos */
        $data = [
            "search" => ucwords(strtolower(trim(filter_input(INPUT_GET, 'search', FILTER_SANITIZE_STRING)))),
            "carrera_id" => filter_input(INPUT_GET, 'carrera_id', FILTER_SANITIZE_NUMBER_INT),
            "usuario_id" => filter_input(INPUT_GET, 'usuario_id', FILTER_SANITIZE_NUMBER_INT),
        ];
        /**Obtenemos Todas las Materias de la Carrera */
        $materias = $this->materiaModel->getMateriasByCarreraNotHasUsuario($data);
        /**Armamos el dataResponse */
        foreach ($materias as $materia) {
            $dataResponse[] = [
                'id' => $materia->id,
                'text' => $materia->nombre,
            ];
        }
        /**Mostramos el resultado en JSON */
        echo json_encode($dataResponse);
    }
    /**
     * Método por el cual se registra o asignas 
     * materias al usuario y son registradas
     * en la base de datos.
     * 
     * @return void
     */
    public function store()
    {
        /**Comprobamos si es Administrador */
        isAdmin();
        /**Obtenemos las Carreras */
        $carreras = $this->carreraModel->getCarreras();
        $data =         $data = [
            'titulo' => 'Asignar Materias',
            'carreras' => $carreras,
            'dataTables' => 'MateriasUsuario',
        ];
        /**Agregamos los Datos de la Validación */
        $data = array_merge($data, $this->validateStore());
        /**Si no hubo errores hacemos el update
         * caso contrario Retornamos la Vista con los errores.
         */
        if (!$data['error']) {
            /**Comprobamos que no hubo errores en el Insert y hacemos un redirect a 
             * usuarios/index con un mensaje
             * si hubo errores devolvemos la vista con un mensaje de error y
             * con todos los datos ingresados.
             */
            foreach ($data['materias'] as $materia) {

                if ($this->materiaUsuarioModel->store($data['id'], $materia)) {
                    flash('usuario_index_mensaje', 'Se Asignaron las Materias Correctamente.');
                    redirect('usuario');
                } else {
                    flash('materiausuario_asignar_mensaje', 'Ocurrió un Error al Intentar Asignar las Materias al Usuario.', 'danger');
                    return $this->view('materiausuario/asignarmateria', $data);
                }
            }
        } else {
            flash('materiausuario_asignar_mensaje', 'Surgieron Errores Por Favor Verifica, los Datos Ingresados.', 'warning');
            return $this->view('materiausuario/asignarmateria', $data);
        }
    }
    /**
     * Se obtiene todos las Materias Asignadas del Usuario
     * En Formato JSON para ser Usado en DataTables
     *
     * @return json
     */
    public function getMateriasUsuarioDataTables()
    {
        /**Array para el response */
        $dataResponse = [];
        /**Recibimos lo Valores de DataTable */
        $columnIndex = $_GET['order'][0]['column']; // Índice de columna
        $draw = $_GET['draw'];
        $data = [
            'row' => $_GET['start'], //Desde que registro para registro por pagina
            'rowPerPage' => $_GET['length'], //Hasta que registro para Registros por Pagina
            'columnName' => $_GET['columns'][$columnIndex]['data'], // Nombre de la Columna
            'columnSortOrder' => $_GET['order'][0]['dir'], // Orden ASC o DESC
            'searchValue' => filter_var($_GET['search']['value'], FILTER_SANITIZE_STRING), // Valor Buscado
            'usuario_id' => filter_input(INPUT_GET, 'usuario_id', FILTER_SANITIZE_NUMBER_INT)
        ];
        /** Número total de registros sin filtrar */
        $totalRegistros = $this->materiaUsuarioModel->countMateriasUsuario(null, $data['usuario_id']);
        /**Número total de registros con filtro */
        $totalRegistrosFiltrado = $this->materiaUsuarioModel->countMateriasUsuario($data['searchValue'], $data['usuario_id']);
        $materiasUsuario = $this->materiaUsuarioModel->getMateriasUsuarioDataTables($data);
        /**Armamos el dataResponse */
        foreach ($materiasUsuario as $key => $materiaUsuario) {
            $dataResponse[] = [
                'id' => $materiaUsuario->id,
                'key' => ($key + 1),
                'nombre' => $materiaUsuario->nombre,
                'created_at' => $materiaUsuario->created_at,
            ];
        }
        /**Armamos el response para el Ajax */
        $response = [
            "draw" => intval($draw),
            "iTotalRecords" => $totalRegistros,
            "iTotalDisplayRecords" => $totalRegistrosFiltrado,
            "aaData" => $dataResponse
        ];
        /**Mostramos el resultado en JSON */
        echo json_encode($response);
    }
    /**
     * Método para dar de baja una materia de un usuario
     * El borrado que realiza es un borrado lógico.
     *
     * @return void
     */
    public function destroy()
    {
        /**Comprobamos si es Administrador */
        isAdmin();
        /**Obtenemos el ID */
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
            /**Verificamos si el Usuario se elimino */
            if ($this->materiaUsuarioModel->destroy($id)) {
                flash('materiausuario_asignar_mensaje', 'La Materia fue Eliminada Correctamente.');
                back();
            } else {
                flash('materiausuario_asignar_mensaje', 'Ocurrió un Error al Intentar Eliminar la Materia.', 'danger');
                back();
            }
    }
    /**Valida todos los Datos de la Materias Asignada y los
     * Sanitiza.
     *
     * @return [array] $data Un array con todos los datos.
     */
    public function validateStore()
    {
        /**Recepción de Campos */
        $data = [
            'id' => filter_input(INPUT_POST, 'usuario_id', FILTER_SANITIZE_NUMBER_INT),
            'nombre' => ucwords(strtolower(trim(filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING)))),
            'apellido' => ucwords(strtolower(trim(filter_input(INPUT_POST, 'apellido', FILTER_SANITIZE_STRING)))),
            'dni' => filter_input(INPUT_POST, 'dni', FILTER_SANITIZE_NUMBER_INT),
            'carrera' => filter_input(INPUT_POST, 'carrera', FILTER_SANITIZE_NUMBER_INT),
            'materias' => filter_input(INPUT_POST, 'materias', FILTER_SANITIZE_NUMBER_INT, FILTER_REQUIRE_ARRAY),
            'carrera_err' => '',
            'materias_err' => '',
            'error' => false
        ];
        /**Validaciones de Todos los Campos con las Distintas Reglas*/
        //Carreras
        if (empty($data['carrera'])) {
            $data['carrera_err'] = 'Debe Seleccionar al Menos Una Carrera.';
            $data['error'] = true;
        }
        //Carreras
        if (empty($data['materias'])) {
            $data['materias_err'] = 'Debe Seleccionar al Menos Una Materia.';
            $data['error'] = true;
        }
        return $data;
    }
}
