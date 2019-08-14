<?php
/**/
include_once '../DAO/ingresosDAO.php';
include_once 'helper_controller/render_table.php';

class ingresosController extends ingresosDAO
{

    public $NameCookieApp;
    public $id_modulo;
    public $table_inst;
    public $ingresosId;

    public function __construct()
    {

        include '../conexion/datos.php';

        $this->id_modulo     = 16; //id de la tabla modulos
        $this->NameCookieApp = $NomCookiesApp;

    }

    //Funciones-------------------------------------------
    //Espacio para las funciones de esta clase
    public function getTablaIngresos()
    {

        //permisos-------------------------------------------------------------------------
        $arrPermisos = $this->getPermisosModulo_Tipo($this->id_modulo, $_COOKIE[$this->NameCookieApp . "_IDtipo"]);
        $edita       = $arrPermisos[0]["editar"];
        $elimina     = $arrPermisos[0]["eliminar"];
        $consulta    = $arrPermisos[0]["consultar"];
        //---------------------------------------------------------------------------------

        //Define las variables de la tabla a renderizar

        //Los campos que se van a ver
        $ingresos_campos = [
            ["nombre" => "fec_ing"],
            ["nombre" => "afiliado"],
            ["nombre" => "nom_ting"],
            ["nombre" => "val_ing"],
        ];
        //la configuracion de los botones de opciones
        $ingresos_btn = [
            [
                "tipo"    => "editar",
                "nombre"  => "ingresos",
                "permiso" => $edita,
            ],
            [
                "tipo"    => "eliminar",
                "nombre"  => "ingresos",
                "permiso" => $elimina,
            ],

        ];

        //---------------------------------------------------------------------------------
        //carga el array desde el DAO
        $ingresos = $this->getIngresos();
        //print_r($ingresos);
        //echo $this->getCookieProyectoM();

        //Instancia el render
        $this->table_inst = new RenderTable($ingresos, $ingresos_campos, $ingresos_btn, $array_opciones);
        //---------------------------------------------------------------------------------

        //valida si hay usuarios y permiso de consulta
        if (($ingresos) && ($consulta == 1)) {

            //ejecuta el render de la tabla
            $this->table_inst->render();

        } elseif (($ingresos) && ($consulta == 0)) {

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

    public function getSelectTipoIngreso()
    {
        $tipo = $this->getTipoIngreso();

        for ($a = 0; $a < sizeof($tipo); $a++) {
            echo "<option value='" . $tipo[$a]["pkID"] . "'>" . $tipo[$a]["nom_ting"] . "</option>";
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
