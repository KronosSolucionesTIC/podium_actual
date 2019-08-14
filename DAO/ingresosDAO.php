<?php
/**/
include_once 'genericoDAO.php';

class ingresosDAO
{
    use GenericoDAO;
    public $q_general;

    public function getIngresos()
    {
        $this->q_general = "SELECT *,ingresos.pkID AS pkID, CONCAT(nom1_afi,' ',nom2_afi,' ',apel1_afi,' ',apel2_afi) AS afiliado FROM ingresos
                            INNER JOIN afiliado ON afiliado.pkID = ingresos.fkID_afiliado
                            INNER JOIN tipo_ingresos ON tipo_ingresos.pkID = ingresos.fkID_tipo_ingreso
                            WHERE ingresos.estado = 1
                            ORDER BY fec_ing DESC";

        return $this->EjecutarConsulta($this->q_general);
    }

    public function getAfiliado()
    {
        $this->q_general = "SELECT *,CONCAT(nom1_afi,' ',nom2_afi,' ',apel1_afi,' ',apel2_afi) AS afiliado FROM afiliado
                            WHERE estado = 1
                            ORDER BY afiliado";

        return $this->EjecutarConsulta($this->q_general);
    }

    public function getTipoIngreso()
    {
        $this->q_general = "SELECT * FROM tipo_ingresos
                            WHERE estado = 1
                            ORDER BY nom_ting";

        return $this->EjecutarConsulta($this->q_general);
    }

    public function getProfesor()
    {
        $this->q_general = "SELECT *,CONCAT(nom1_pro,' ',nom2_pro,' ',apel1_pro,' ',apel2_pro) AS profesor FROM profesor
                            WHERE estado = 1
                            ORDER BY profesor";

        return $this->EjecutarConsulta($this->q_general);
    }
}
