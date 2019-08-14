<?php
/**/
include_once 'genericoDAO.php';

class epsDAO
{
    use GenericoDAO;
    public $q_general;

    public function getEps()
    {
        $this->q_general = "SELECT * FROM eps WHERE estado = 1";

        return $this->EjecutarConsulta($this->q_general);
    }
}
