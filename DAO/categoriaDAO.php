<?php
/**/
include_once 'genericoDAO.php';

class categoriaDAO
{
    use GenericoDAO;
    public $q_general;

    public function getcategoria()
    {
        $this->q_general = "SELECT * FROM categoria WHERE estado = 1";

        return $this->EjecutarConsulta($this->q_general);
    }
}
