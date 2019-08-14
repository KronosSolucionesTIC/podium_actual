<?php
/**/
include_once 'genericoDAO.php';

class tipo_gastosDAO
{
    use GenericoDAO;
    public $q_general;

    public function getTipo_gastos()
    {
        $this->q_general = "SELECT * FROM tipo_gastos WHERE estado = 1 ORDER BY nom_gas";

        return $this->EjecutarConsulta($this->q_general);
    }
}
