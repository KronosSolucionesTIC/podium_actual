<?php
/**/
include_once '../DAO/asignacionDAO.php';
include_once 'helper_controller/render_table.php';

class asignacionController extends asignacionDAO
{

    public $NameCookieApp;
    public $id_modulo;
    public $table_inst;
    public $asignacionId;

    public function __construct()
    {

        include '../conexion/datos.php';

        $this->id_modulo     = 16; //id de la tabla modulos
        $this->NameCookieApp = $NomCookiesApp;

    }

    //Funciones-------------------------------------------
    //Espacio para las funciones de esta clase
    public function getTablaAsignacion()
    {

        //permisos-------------------------------------------------------------------------
        $arrPermisos = $this->getPermisosModulo_Tipo($this->id_modulo, $_COOKIE[$this->NameCookieApp . "_IDtipo"]);
        $edita       = $arrPermisos[0]["editar"];
        $elimina     = $arrPermisos[0]["eliminar"];
        $consulta    = $arrPermisos[0]["consultar"];
        //---------------------------------------------------------------------------------

        //Define las variables de la tabla a renderizar

        //Los campos que se van a ver
        $asignacion_campos = [
            ["nombre" => "fecha"],
            ["nombre" => "afiliado"],
            ["nombre" => "nom_costo"],
            ["nombre" => "valor"],
        ];
        //la configuracion de los botones de opciones
        $asignacion_btn = [
            [
                "tipo"    => "eliminar",
                "nombre"  => "costo_afiliado",
                "permiso" => $elimina,
            ],

        ];

        //---------------------------------------------------------------------------------
        //carga el array desde el DAO
        $asignacion = $this->getAsignacion();
        //print_r($asignacion);
        //echo $this->getCookieProyectoM();

        //Instancia el render
        $this->table_inst = new RenderTable($asignacion, $asignacion_campos, $asignacion_btn, $array_opciones);
        //---------------------------------------------------------------------------------

        //valida si hay usuarios y permiso de consulta
        if (($asignacion) && ($consulta == 1)) {

            //ejecuta el render de la tabla
            $this->table_inst->render();

        } elseif (($asignacion) && ($consulta == 0)) {

            $this->table_inst->render_blank();

            echo "<h3>En este momento no tiene permiso de consulta.</h3>";

        } else {

            $this->table_inst->render_blank();

            echo "<h3>En este momento no hay registros.</h3>";
        };
        //---------------------------------------------------------------------------------

    }

    public function getSelectAfiliado()
    {
        $tipo = $this->getAfiliado();

        for ($a = 0; $a < sizeof($tipo); $a++) {
            echo "<option value='" . $tipo[$a]["pkID"] . "'>" . $tipo[$a]["afiliado"] . "</option>";
        }
    }

    public function getSelectCosto()
    {
        $tipo = $this->getCosto();

        for ($a = 0; $a < sizeof($tipo); $a++) {
            echo "<option value='" . $tipo[$a]["pkID"] . "'>" . $tipo[$a]["nom_costo"] . "</option>";
        }
    }
}
