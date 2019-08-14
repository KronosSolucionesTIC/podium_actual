<?php
/**/
include_once '../DAO/epsDAO.php';
include_once 'helper_controller/render_table.php';

class epsController extends epsDAO
{

    public $NameCookieApp;
    public $id_modulo;
    public $table_inst;
    public $epsId;

    public function __construct()
    {

        include '../conexion/datos.php';

        $this->id_modulo     = 16; //id de la tabla modulos
        $this->NameCookieApp = $NomCookiesApp;

    }

    //Funciones-------------------------------------------
    //Espacio para las funciones de esta clase
    public function getTablaEps()
    {

        //permisos-------------------------------------------------------------------------
        $arrPermisos = $this->getPermisosModulo_Tipo($this->id_modulo, $_COOKIE[$this->NameCookieApp . "_IDtipo"]);
        $edita       = $arrPermisos[0]["editar"];
        $elimina     = $arrPermisos[0]["eliminar"];
        $consulta    = $arrPermisos[0]["consultar"];
        //---------------------------------------------------------------------------------

        //Define las variables de la tabla a renderizar

        //Los campos que se van a ver
        $eps_campos = [
            ["nombre" => "nombre_eps"],
        ];
        //la configuracion de los botones de opciones
        $eps_btn = [

            [
                "tipo"    => "editar",
                "nombre"  => "eps",
                "permiso" => $edita,
            ],
            [
                "tipo"    => "eliminar",
                "nombre"  => "eps",
                "permiso" => $elimina,
            ],

        ];

        //---------------------------------------------------------------------------------
        //carga el array desde el DAO
        $eps = $this->getEps();
        //print_r($eps);
        //echo $this->getCookieProyectoM();

        //Instancia el render
        $this->table_inst = new RenderTable($eps, $eps_campos, $eps_btn, $array_opciones);
        //---------------------------------------------------------------------------------

        //valida si hay usuarios y permiso de consulta
        if (($eps) && ($consulta == 1)) {

            //ejecuta el render de la tabla
            $this->table_inst->render();

        } elseif (($eps) && ($consulta == 0)) {

            $this->table_inst->render_blank();

            echo "<h3>En este momento no tiene permiso de consulta.</h3>";

        } else {

            $this->table_inst->render_blank();

            echo "<h3>En este momento no hay registros.</h3>";
        };
        //---------------------------------------------------------------------------------

    }
}
