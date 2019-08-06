<?php
/**/

//ini_set('error_reporting', E_ALL|E_STRICT);
//ini_set('display_errors', 1);

include_once 'usuariosDAO.php';

class funcionarioDAO extends UsuariosDAO
{

    public function getFuncionario($pkID_proyectoM)
    {

        $query = "select pkID, concat_ws(' ',nombre_funcionario,apellido_funcionario) as nombres, documento_funcionario, telefono_funcionario, email_funcionario FROM `funcionario` WHERE estadoV=1 and proyecto_marco=".$pkID_proyectoM;  

        return $this->EjecutarConsulta($query);
    }

    public function getRolEstudiante()
    {

        $query = "select usuarios.pkID as pkID_estudiante, usuarios.fkID_rol as pkID_rol, rol.nombre as rol from usuarios

					INNER JOIN rol ON rol.pkID = usuarios.fkID_rol

					LEFT JOIN usuario_grupo ON usuario_grupo.fkID_usuario = usuarios.pkID

					WHERE usuarios.fkID_tipo = 9 ";

        return $this->EjecutarConsulta($query);
    }

    public function getRoles($pkID_tipo)
    {

        $query = "select * FROM `rol` WHERE fkID_tipo_usuario = " . $pkID_tipo . " ORDER BY nombre ASC";

        return $this->EjecutarConsulta($query);
    }

    public function getDepartamentos()
    {

        $query = "select * FROM `departamento`";

        return $this->EjecutarConsulta($query);
    }

    public function getMunicipios()
    {

        $query = "select * FROM `municipio`";

        return $this->EjecutarConsulta($query);
    }

    public function getProyectosMarcoId($pkID)
    {

        $query = "select proyecto_marco.*, departamento.nombre_departamento as nom_departamento

                      FROM proyecto_marco

                      INNER JOIN departamento ON departamento.pkID = proyecto_marco.fkID_departamento

                      WHERE proyecto_marco.pkID = " . $pkID;

        return $this->EjecutarConsulta($query);
    }

}
