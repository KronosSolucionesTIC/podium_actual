<?php
/**/
include_once 'genericoDAO.php';

class habilitarDAO
{
    use GenericoDAO;
    public $q_general;

    public function getHabilitar()
    {
        $this->q_general = "SELECT * FROM afiliado WHERE estado = 2";

        return $this->EjecutarConsulta($this->q_general);
    }
}
