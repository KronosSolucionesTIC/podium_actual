<?php
/**/
include_once '../DAO/gastosDAO.php';
include_once 'helper_controller/render_table.php';

class gastosController extends gastosDAO
{

    public $NameCookieApp;
    public $id_modulo;
    public $table_inst;
    public $gastosId;

    public function __construct()
    {

        include '../conexion/datos.php';

        $this->id_modulo     = 16; //id de la tabla modulos
        $this->NameCookieApp = $NomCookiesApp;

    }

    //Funciones-------------------------------------------
    //Espacio para las funciones de esta clase
    public function getTablaGastos()
    {

        //permisos-------------------------------------------------------------------------
        $arrPermisos = $this->getPermisosModulo_Tipo($this->id_modulo, $_COOKIE[$this->NameCookieApp . "_IDtipo"]);
        $edita       = $arrPermisos[0]["editar"];
        $elimina     = $arrPermisos[0]["eliminar"];
        $consulta    = $arrPermisos[0]["consultar"];
        //---------------------------------------------------------------------------------

        //Define las variables de la tabla a renderizar

        //Los campos que se van a ver
        $gastos_campos = [
            ["nombre" => "fecha_gasto"],
            ["nombre" => "proveedor"],
            ["nombre" => "nom_gas"],
            ["nombre" => "valor_gasto"],
        ];
        //la configuracion de los botones de opciones
        $gastos_btn = [
            [
                "tipo"    => "editar",
                "nombre"  => "gastos",
                "permiso" => $edita,
            ],
            [
                "tipo"    => "eliminar",
                "nombre"  => "gastos",
                "permiso" => $elimina,
            ],

        ];

        //---------------------------------------------------------------------------------
        //carga el array desde el DAO
        $gastos = $this->getGastos();
        //print_r($gastos);
        //echo $this->getCookieProyectoM();

        //Instancia el render
        $this->table_inst = new RenderTable($gastos, $gastos_campos, $gastos_btn, $array_opciones);
        //---------------------------------------------------------------------------------

        //valida si hay usuarios y permiso de consulta
        if (($gastos) && ($consulta == 1)) {

            //ejecuta el render de la tabla
            $this->table_inst->render();

        } elseif (($gastos) && ($consulta == 0)) {

            $this->table_inst->render_blank();

            echo "<h3>En este momento no tiene permiso de consulta.</h3>";

        } else {

            $this->table_inst->render_blank();

            echo "<h3>En este momento no hay registros.</h3>";
        };
        //---------------------------------------------------------------------------------

    }

    public function getSelectProveedor()
    {
        $tipo = $this->getProveedor();

        for ($a = 0; $a < sizeof($tipo); $a++) {
            echo "<option value='" . $tipo[$a]["pkID"] . "'>" . $tipo[$a]["proveedor"] . "</option>";
        }
    }

    public function getSelectTipoGasto()
    {
        $tipo = $this->getTipoGasto();

        for ($a = 0; $a < sizeof($tipo); $a++) {
            echo "<option value='" . $tipo[$a]["pkID"] . "'>" . $tipo[$a]["nom_gas"] . "</option>";
        }
    }

    public function getSelectProfesor()
    {
        $tipo = $this->getProfesor();

        for ($a = 0; $a < sizeof($tipo); $a++) {
            echo "<option value='" . $tipo[$a]["pkID"] . "'>" . $tipo[$a]["profesor"] . "</option>";
        }
    }
}
