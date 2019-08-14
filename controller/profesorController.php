<?php
/**/
include_once '../DAO/profesorDAO.php';
include_once 'helper_controller/render_table.php';

class profesorController extends profesorDAO
{

    public $NameCookieApp;
    public $id_modulo;
    public $table_inst;
    public $profesorId;

    public function __construct()
    {

        include '../conexion/datos.php';

        $this->id_modulo     = 16; //id de la tabla modulos
        $this->NameCookieApp = $NomCookiesApp;

    }

    //Funciones-------------------------------------------
    //Espacio para las funciones de esta clase
    public function getTablaprofesor()
    {

        //permisos-------------------------------------------------------------------------
        $arrPermisos = $this->getPermisosModulo_Tipo($this->id_modulo, $_COOKIE[$this->NameCookieApp . "_IDtipo"]);
        $edita       = $arrPermisos[0]["editar"];
        $elimina     = $arrPermisos[0]["eliminar"];
        $consulta    = $arrPermisos[0]["consultar"];
        //---------------------------------------------------------------------------------

        //Define las variables de la tabla a renderizar

        //Los campos que se van a ver
        $profesor_campos = [
            ["nombre" => "id_pro"],
            ["nombre" => "nom1_pro"],
            ["nombre" => "nom2_pro"],
            ["nombre" => "apel1_pro"],
            ["nombre" => "apel2_pro"],
        ];
        //la configuracion de los botones de opciones
        $profesor_btn = [

            [
                "tipo"    => "editar",
                "nombre"  => "profesor",
                "permiso" => $edita,
            ],
            [
                "tipo"    => "eliminar",
                "nombre"  => "profesor",
                "permiso" => $elimina,
            ],

        ];

        //---------------------------------------------------------------------------------
        //carga el array desde el DAO
        $profesor = $this->getprofesor();
        //print_r($profesor);
        //echo $this->getCookieProyectoM();

        //Instancia el render
        $this->table_inst = new RenderTable($profesor, $profesor_campos, $profesor_btn, $array_opciones);
        //---------------------------------------------------------------------------------

        //valida si hay usuarios y permiso de consulta
        if (($profesor) && ($consulta == 1)) {

            //ejecuta el render de la tabla
            $this->table_inst->render();

        } elseif (($profesor) && ($consulta == 0)) {

            $this->table_inst->render_blank();

            echo "<h3>En este momento no tiene permiso de consulta.</h3>";

        } else {

            $this->table_inst->render_blank();

            echo "<h3>En este momento no hay registros.</h3>";
        };
        //---------------------------------------------------------------------------------

    }

    public function getSelectEps()
    {
        $tipo = $this->getEps();

        for ($a = 0; $a < sizeof($tipo); $a++) {
            echo "<option value='" . $tipo[$a]["pkID"] . "'>" . $tipo[$a]["nombre_eps"] . "</option>";
        }
    }
}
