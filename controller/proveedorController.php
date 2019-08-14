<?php
/**/
include_once '../DAO/proveedorDAO.php';
include_once 'helper_controller/render_table.php';

class proveedorController extends proveedorDAO
{

    public $NameCookieApp;
    public $id_modulo;
    public $table_inst;
    public $proveedorId;

    public function __construct()
    {

        include '../conexion/datos.php';

        $this->id_modulo     = 16; //id de la tabla modulos
        $this->NameCookieApp = $NomCookiesApp;

    }

    //Funciones-------------------------------------------
    //Espacio para las funciones de esta clase
    public function getTablaproveedor()
    {

        //permisos-------------------------------------------------------------------------
        $arrPermisos = $this->getPermisosModulo_Tipo($this->id_modulo, $_COOKIE[$this->NameCookieApp . "_IDtipo"]);
        $edita       = $arrPermisos[0]["editar"];
        $elimina     = $arrPermisos[0]["eliminar"];
        $consulta    = $arrPermisos[0]["consultar"];
        //---------------------------------------------------------------------------------

        //Define las variables de la tabla a renderizar

        //Los campos que se van a ver
        $proveedor_campos = [
            ["nombre" => "nom1_prov"],
            ["nombre" => "nom2_prov"],
            ["nombre" => "apel1_prov"],
            ["nombre" => "apel2_prov"],
        ];
        //la configuracion de los botones de opciones
        $proveedor_btn = [

            [
                "tipo"    => "editar",
                "nombre"  => "proveedor",
                "permiso" => $edita,
            ],
            [
                "tipo"    => "eliminar",
                "nombre"  => "proveedor",
                "permiso" => $elimina,
            ],

        ];

        //---------------------------------------------------------------------------------
        //carga el array desde el DAO
        $proveedor = $this->getproveedor();
        //print_r($proveedor);
        //echo $this->getCookieProyectoM();

        //Instancia el render
        $this->table_inst = new RenderTable($proveedor, $proveedor_campos, $proveedor_btn, $array_opciones);
        //---------------------------------------------------------------------------------

        //valida si hay usuarios y permiso de consulta
        if (($proveedor) && ($consulta == 1)) {

            //ejecuta el render de la tabla
            $this->table_inst->render();

        } elseif (($proveedor) && ($consulta == 0)) {

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
