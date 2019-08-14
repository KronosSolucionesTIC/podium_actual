<?php
/**/
include_once 'genericoDAO.php';

class costosDAO
{
    use GenericoDAO;
    public $q_general;

    public function getcostos()
    {
        $this->q_general = "SELECT * FROM costos WHERE estado = 1 ORDER BY nom_costo";

        return $this->EjecutarConsulta($this->q_general);
    }
}
