<?php
/**/
include_once 'genericoDAO.php';

class asignacionDAO
{
    use GenericoDAO;
    public $q_general;

    public function getAsignacion()
    {
        $this->q_general = "SELECT *,costo_afiliado.pkID AS pkID, CONCAT(nom1_afi,' ',nom2_afi,' ',apel1_afi,' ',apel2_afi) AS afiliado FROM costo_afiliado
                            INNER JOIN afiliado ON afiliado.pkID = costo_afiliado.fkID_afiliado
                            INNER JOIN costos ON costos.pkID = costo_afiliado.fkID_costo
                            WHERE costo_afiliado.estado = 1
                            ORDER BY fecha DESC";

        return $this->EjecutarConsulta($this->q_general);
    }

    public function getAfiliado()
    {
        $this->q_general = "SELECT *,CONCAT(nom1_afi,' ',nom2_afi,' ',apel1_afi,' ',apel2_afi) AS afiliado FROM afiliado
                            WHERE estado = 1
                            ORDER BY afiliado";

        return $this->EjecutarConsulta($this->q_general);
    }

    public function getCosto()
    {
        $this->q_general = "SELECT * FROM costos
                            WHERE estado = 1
                            ORDER BY nom_costo";

        return $this->EjecutarConsulta($this->q_general);
    }
}
