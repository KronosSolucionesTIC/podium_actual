<?php
/**/
include_once '../DAO/afiliadoDAO.php';
include_once 'helper_controller/render_table.php';

class afiliadoController extends afiliadoDAO
{

    public $NameCookieApp;
    public $id_modulo;
    public $table_inst;
    public $afiliadoId;

    public function __construct()
    {

        include '../conexion/datos.php';

        $this->id_modulo     = 16; //id de la tabla modulos
        $this->NameCookieApp = $NomCookiesApp;

    }

    //Funciones-------------------------------------------
    //Espacio para las funciones de esta clase
    public function getTablaAfiliado()
    {

        //permisos-------------------------------------------------------------------------
        $arrPermisos = $this->getPermisosModulo_Tipo($this->id_modulo, $_COOKIE[$this->NameCookieApp . "_IDtipo"]);
        $edita       = $arrPermisos[0]["editar"];
        $elimina     = $arrPermisos[0]["eliminar"];
        $consulta    = $arrPermisos[0]["consultar"];
        //---------------------------------------------------------------------------------

        //Define las variables de la tabla a renderizar

        //Los campos que se van a ver
        $afiliado_campos = [
            ["nombre" => "nombre_categoria"],
            ["nombre" => "nom1_afi"],
            ["nombre" => "nom2_afi"],
            ["nombre" => "apel1_afi"],
            ["nombre" => "apel2_afi"],
        ];
        //la configuracion de los botones de opciones
        $afiliado_btn = [

            [
                "tipo"    => "editar",
                "nombre"  => "afiliado",
                "permiso" => $edita,
            ],
            [
                "tipo"    => "eliminar",
                "nombre"  => "afiliado",
                "permiso" => $elimina,
            ],

        ];

        //---------------------------------------------------------------------------------
        //carga el array desde el DAO
        $afiliado = $this->getAfiliado();
        //print_r($afiliado);
        //echo $this->getCookieProyectoM();

        //Instancia el render
        $this->table_inst = new RenderTable($afiliado, $afiliado_campos, $afiliado_btn, $array_opciones);
        //---------------------------------------------------------------------------------

        //valida si hay usuarios y permiso de consulta
        if (($afiliado) && ($consulta == 1)) {

            //ejecuta el render de la tabla
            $this->table_inst->render();

        } elseif (($afiliado) && ($consulta == 0)) {

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

    public function getSelectCategoria()
    {
        $tipo = $this->getCategoria();

        for ($a = 0; $a < sizeof($tipo); $a++) {
            echo "<option value='" . $tipo[$a]["pkID"] . "'>" . $tipo[$a]["nombre_categoria"] . "</option>";
        }
    }
}
