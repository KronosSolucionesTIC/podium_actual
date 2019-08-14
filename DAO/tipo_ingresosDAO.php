<?php
/**/
include_once 'genericoDAO.php';

class tipo_ingresosDAO
{
    use GenericoDAO;
    public $q_general;

    public function gettipo_ingresos()
    {
        $this->q_general = "SELECT * FROM tipo_ingresos WHERE estado = 1 ORDER BY nom_ting";

        return $this->EjecutarConsulta($this->q_general);
    }
}
