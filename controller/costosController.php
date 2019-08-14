<?php
/**/
include_once '../DAO/costosDAO.php';
include_once 'helper_controller/render_table.php';

class costosController extends costosDAO
{

    public $NameCookieApp;
    public $id_modulo;
    public $table_inst;
    public $costosId;

    public function __construct()
    {

        include '../conexion/datos.php';

        $this->id_modulo     = 16; //id de la tabla modulos
        $this->NameCookieApp = $NomCookiesApp;

    }

    //Funciones-------------------------------------------
    //Espacio para las funciones de esta clase
    public function getTablaCostos()
    {

        //permisos-------------------------------------------------------------------------
        $arrPermisos = $this->getPermisosModulo_Tipo($this->id_modulo, $_COOKIE[$this->NameCookieApp . "_IDtipo"]);
        $edita       = $arrPermisos[0]["editar"];
        $elimina     = $arrPermisos[0]["eliminar"];
        $consulta    = $arrPermisos[0]["consultar"];
        //---------------------------------------------------------------------------------

        //Define las variables de la tabla a renderizar

        //Los campos que se van a ver
        $costos_campos = [
            ["nombre" => "nom_costo"],
            ["nombre" => "val_costo"],
        ];
        //la configuracion de los botones de opciones
        $costos_btn = [

            [
                "tipo"    => "editar",
                "nombre"  => "costos",
                "permiso" => $edita,
            ],
            [
                "tipo"    => "eliminar",
                "nombre"  => "costos",
                "permiso" => $elimina,
            ],

        ];

        //---------------------------------------------------------------------------------
        //carga el array desde el DAO
        $costos = $this->getcostos();
        //print_r($costos);
        //echo $this->getCookieProyectoM();

        //Instancia el render
        $this->table_inst = new RenderTable($costos, $costos_campos, $costos_btn, $array_opciones);
        //---------------------------------------------------------------------------------

        //valida si hay usuarios y permiso de consulta
        if (($costos) && ($consulta == 1)) {

            //ejecuta el render de la tabla
            $this->table_inst->render();

        } elseif (($costos) && ($consulta == 0)) {

            $this->table_inst->render_blank();

            echo "<h3>En este momento no tiene permiso de consulta.</h3>";

        } else {

            $this->table_inst->render_blank();

            echo "<h3>En este momento no hay registros.</h3>";
        };
        //---------------------------------------------------------------------------------

    }
}
