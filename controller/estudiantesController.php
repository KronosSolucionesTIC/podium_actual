<?php
/**/
include_once '../DAO/estudiantesDAO.php';
include_once 'helper_controller/render_table.php';

class estudiantesController extends estudiantesDAO
{

    public $NameCookieApp;
    public $id_modulo;

    public function __construct()
    {

        include '../conexion/datos.php';

        $this->id_modulo     = 30; //id de la tabla modulos
        $this->NameCookieApp = $NomCookiesApp;

    }

    //Funciones-------------------------------------------
    //Espacio para las funciones de esta clase.

    //---------------------------------------------------------------------------------
    public function getTablaEstudiantes($pkID_proyectoM)
    {

        //permisos-------------------------------------------------------------------------
        $arrPermisos = $this->getPermisosModulo_Tipo($this->id_modulo, $_COOKIE[$this->NameCookieApp . "_IDtipo"]);
        $edita       = $arrPermisos[0]["editar"];
        $elimina     = $arrPermisos[0]["eliminar"];
        $consulta    = $arrPermisos[0]["consultar"];

        //---------------------------------------------------------------------------------

        //Define las variables de la tabla a renderizar

        //Los campos que se van a ver
        $array_campos = [
            //["nombre"=>"pkID"],
            ["nombre" => "nombres"],
            ["nombre" => "documento_estudiante"],
            ["nombre" => "grado_estudiante"],
        ];
        //la configuracion de los botones de opciones
        $array_btn = [

            [
                "tipo"    => "editar",
                "nombre"  => "estudiante",
                "permiso" => $edita,
            ],
            [
                "tipo"    => "eliminar",
                "nombre"  => "estudiante",
                "permiso" => $elimina,
            ],

        ];

        $array_opciones = [
            "modulo" => "estudiante", //nombre del modulo definido para jquerycontrollerV2
            "title"  => "Click Ver Detalles", //etiqueta html title
            "href"   => "detalles_estudiantes.php?id_estudiante=",
            "class"  => "detail", //clase que permite que añadir el evento jquery click
        ];
        //---------------------------------------------------------------------------------
        //get de los datos
        $estudiantes = $this->getEstudiantes($pkID_proyectoM);

        //Instancia el render
        $this->table_inst = new RenderTable($estudiantes, $array_campos, $array_btn, []);
        //---------------------------------------------------------------------------------
        /**/
        //valida si hay resultados
        if (($estudiantes) && ($consulta == 1)) {

            //ejecuta el render de la tabla
            $this->table_inst->render();

        } elseif (($estudiantes) && ($consulta == 0)) {

            $this->table_inst->render_blank();

            echo "<h3>En este momento no tiene permiso de Consulta.</h3>";

        } else {

            $this->table_inst->render_blank();

            echo "<h3>En este momento no hay registros creados.</h3>";
        };

        //---------------------------------------------------------------------------------

    }

    public function getSelectTipoDocumento()
    {

        $tipo = $this->getTipoDocumento();

        echo "<select name='fkID_tipo_documento' id='fkID_tipo_documento' class='form-control' required = 'true'>";
        echo "<option></option>";
        for ($a = 0; $a < sizeof($tipo); $a++) {
            echo "<option value='" . $tipo[$a]["pkID"] . "'>" . $tipo[$a]["nombre"] . "</option>";
        }
        echo "</select>";
    }

    public function getSelectGrupoEtnico()
    {

        $tipo = $this->getGrupoEtnico();

        echo "<select name='fkID_grupo_etnico' id='fkID_grupo_etnico' class='form-control'>";
        echo "<option></option>";
        for ($a = 0; $a < sizeof($tipo); $a++) {
            echo "<option value='" . $tipo[$a]["pkID"] . "'>" . $tipo[$a]["nombre"] . "</option>";
        }
        echo "</select>";
    }

    public function getSelectRoles($tipo_user)
    {

        $tipo = $this->getRoles($tipo_user);

        echo "<select name='fkID_rol' id='fkID_rol' class='form-control' required = 'true'>";
        echo "<option></option>";
        for ($a = 0; $a < sizeof($tipo); $a++) {
            echo "<option value='" . $tipo[$a]["pkID"] . "'>" . $tipo[$a]["nombre"] . "</option>";
        }
        echo "</select>";
    }

    public function getSelectGenero()
    {

        $tipo = $this->getGenero();

        echo "<select name='fkID_genero' id='fkID_genero' class='form-control' required = 'true'>";
        echo "<option></option>";
        for ($a = 0; $a < sizeof($tipo); $a++) {
            echo "<option value='" . $tipo[$a]["pkID"] . "'>" . $tipo[$a]["nombre"] . "</option>";
        }
        echo "</select>";
    }

    public function getSelectInstitucion()
    {

        $tipo = $this->getInstitucion();

        echo "<select name='fkID_institucion' id='fkID_institucion' class='form-control' required = 'true'>";
        echo "<option></option>";
        for ($a = 0; $a < sizeof($tipo); $a++) {
            echo "<option value='" . $tipo[$a]["pkID"] . "'>" . $tipo[$a]["nombre"] . "</option>";
        }
        echo "</select>";
    }

    public function getSelectGrados()
    {

        $m_u_Select = $this->getGrados();

        echo "<select name='fkID_grado' id='fkID_grado' class='form-control' data-accion='select' required='true'>";
        echo "<option></option>";
        for ($i = 0; $i < sizeof($m_u_Select); $i++) {
            echo '<option value="' . $m_u_Select[$i]["pkID"] . '" data-nombre = "' . $m_u_Select[$i]["nombre"] . '" >' . $m_u_Select[$i]["nombre"] . '</option>';
        };
        echo '</select>';
    }

    public function getSelectDepartamentos()
    {

        $tipo = $this->getDepartamentos();

        echo '<select id="fkID_departamento" name="fkID_departamento" class="form-control" data-accion="select">
                      <option></option>';

        for ($a = 0; $a < sizeof($tipo); $a++) {
            echo "<option value='" . $tipo[$a]["pkID"] . "'>" . $tipo[$a]["nombre"] . "</option>";
        };

        echo '</select>';
    }

    public function getSelectMunicipios()
    {

        $tipo = $this->getMunicipios();

        echo '<select id="fkID_municipio" name="fkID_municipio" class="form-control" data-accion="select">
                      <option></option>';

        for ($a = 0; $a < sizeof($tipo); $a++) {
            echo "<option value='" . $tipo[$a]["pkID"] . "'>" . $tipo[$a]["nombre"] . "</option>";
        };

        echo '</select>';
    }

    public function getSelectEstudiantes($pkID_proyectoM)
    {
        $tipo = $this->getEstudiantes($pkID_proyectoM);

        echo '<select name="fkID_estudiante" id="fkID_estudiante" class="form-control" required = "true">
                        <option value="" selected>Elija el estudiante del Grupo</option>';
        for ($a = 0; $a < sizeof($tipo); $a++) {
            echo "<option id='fkID_estudiante_form_' data-nombre='" . $tipo[$a]["nombres"] . "' data-grado='" . $tipo[$a]["id_grado"] . "' value='" . $tipo[$a]["pkID"] . "'>" . $tipo[$a]["nombres"] . "</option>";
        }
        echo "</select>";
    }
}
