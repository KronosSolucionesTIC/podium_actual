<?php
/**/
include_once '../DAO/tipo_gastosDAO.php';
include_once 'helper_controller/render_table.php';

class tipo_gastosController extends tipo_gastosDAO
{

    public $NameCookieApp;
    public $id_modulo;
    public $table_inst;
    public $tipo_gastosId;

    public function __construct()
    {

        include '../conexion/datos.php';

        $this->id_modulo     = 16; //id de la tabla modulos
        $this->NameCookieApp = $NomCookiesApp;

    }

    //Funciones-------------------------------------------
    //Espacio para las funciones de esta clase
    public function getTablaTipo_gastos()
    {

        //permisos-------------------------------------------------------------------------
        $arrPermisos = $this->getPermisosModulo_Tipo($this->id_modulo, $_COOKIE[$this->NameCookieApp . "_IDtipo"]);
        $edita       = $arrPermisos[0]["editar"];
        $elimina     = $arrPermisos[0]["eliminar"];
        $consulta    = $arrPermisos[0]["consultar"];
        //---------------------------------------------------------------------------------

        //Define las variables de la tabla a renderizar

        //Los campos que se van a ver
        $tipo_gastos_campos = [
            ["nombre" => "nom_gas"],
        ];
        //la configuracion de los botones de opciones
        $tipo_gastos_btn = [

            [
                "tipo"    => "editar",
                "nombre"  => "tipo_gastos",
                "permiso" => $edita,
            ],
            [
                "tipo"    => "eliminar",
                "nombre"  => "tipo_gastos",
                "permiso" => $elimina,
            ],

        ];

        //---------------------------------------------------------------------------------
        //carga el array desde el DAO
        $tipo_gastos = $this->getTipo_gastos();
        //print_r($tipo_gastos);
        //echo $this->getCookieProyectoM();

        //Instancia el render
        $this->table_inst = new RenderTable($tipo_gastos, $tipo_gastos_campos, $tipo_gastos_btn, $array_opciones);
        //---------------------------------------------------------------------------------

        //valida si hay usuarios y permiso de consulta
        if (($tipo_gastos) && ($consulta == 1)) {

            //ejecuta el render de la tabla
            $this->table_inst->render();

        } elseif (($tipo_gastos) && ($consulta == 0)) {

            $this->table_inst->render_blank();

            echo "<h3>En este momento no tiene permiso de consulta.</h3>";

        } else {

            $this->table_inst->render_blank();

            echo "<h3>En este momento no hay registros.</h3>";
        };
        //---------------------------------------------------------------------------------

    }
}
