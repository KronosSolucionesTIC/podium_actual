<?php
/**/
include_once 'genericoDAO.php';

class profesorDAO
{
    use GenericoDAO;
    public $q_general;

    public function getprofesor()
    {
        $this->q_general = "SELECT * FROM profesor WHERE estado = 1";

        return $this->EjecutarConsulta($this->q_general);
    }
}
